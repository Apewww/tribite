"use client";

import { useEffect, useState } from "react";
import { supabase } from "@/lib/supabase";
import { useRouter } from "next/navigation";
import Link from "next/link";

export default function ProfilePage() {
  const [profile, setProfile] = useState<any>(null);
  const [loading, setLoading] = useState(true);
  const router = useRouter();

  useEffect(() => {
    async function fetchProfile() {
      const { data: { user } } = await supabase.auth.getUser();
      if (!user) {
        router.push("/login");
        return;
      }

      const { data } = await supabase
        .from("akun")
        .select("*")
        .eq("email", user.email)
        .single();

      setProfile(data);
      setLoading(false);
    }
    fetchProfile();
  }, [router]);

  if (loading) return (
    <div className="min-h-screen flex items-center justify-center bg-gray-50">
       <div className="w-10 h-10 border-4 border-rose-100 border-t-rose-600 rounded-full animate-spin"></div>
    </div>
  );

  return (
    <div className="min-h-screen bg-white">
      <nav className="bg-white border-b border-gray-100 px-4 h-16 flex items-center justify-between sticky top-0 z-40">
        <Link href="/dashboard" className="flex items-center gap-2">
            <span className="text-xl">←</span>
            <span className="font-bold text-sm uppercase tracking-widest">Dashboard</span>
        </Link>
        <span className="font-black text-gray-900 uppercase tracking-tighter">Profil Saya</span>
        <div className="w-10"></div>
      </nav>

      <main className="max-w-2xl mx-auto px-4 py-12">
        <div className="space-y-12">
            <div className="flex flex-col items-center gap-4">
                <div className="w-32 h-32 bg-gray-100 rounded-[2.5rem] flex items-center justify-center text-4xl shadow-inner border-4 border-white">
                   👤
                </div>
                <div className="text-center">
                    <h1 className="text-3xl font-black text-gray-900 tracking-tight capitalize">{profile?.nama}</h1>
                    <p className="text-gray-500 font-medium">{profile?.email}</p>
                </div>
            </div>

            <div className="grid grid-cols-1 gap-4">
                <div className="p-6 bg-gray-50 rounded-3xl border border-gray-100 space-y-1">
                    <p className="text-[10px] font-black text-gray-400 uppercase tracking-widest">Nomor Telepon</p>
                    <p className="font-bold text-gray-900">{profile?.telepon || "Belum diatur"}</p>
                </div>
                <div className="p-6 bg-gray-50 rounded-3xl border border-gray-100 space-y-1">
                    <p className="text-[10px] font-black text-gray-400 uppercase tracking-widest">Alamat Pengiriman</p>
                    <p className="font-bold text-gray-900">{profile?.alamat || "Belum diatur"}</p>
                </div>
                <div className="p-6 bg-gray-50 rounded-3xl border border-gray-100 space-y-1">
                    <p className="text-[10px] font-black text-gray-400 uppercase tracking-widest">Metode Pembayaran Utama</p>
                    <p className="font-bold text-gray-900 uppercase tracking-tighter">{profile?.metode_pembayaran || "Belum diatur"}</p>
                </div>
            </div>

            <div className="pt-8 border-t border-gray-100 flex flex-col gap-3">
                <button className="w-full py-4 bg-gray-950 text-white rounded-2xl font-bold hover:bg-rose-600 transition-all active:scale-95 shadow-xl shadow-gray-200">
                    Edit Profil
                </button>
                <button className="w-full py-4 bg-white text-rose-600 border border-rose-100 rounded-2xl font-bold hover:bg-rose-50 transition-all active:scale-95">
                    Ubah Password
                </button>
            </div>
        </div>
      </main>
    </div>
  );
}
