"use client";

import { useEffect, useState } from "react";
import { supabase } from "@/lib/supabase";
import { useRouter } from "next/navigation";
import Link from "next/link";

import { Navbar } from "@/components/navbar";

export const dynamic = "force-dynamic";

export default function DashboardPage() {
  const [user, setUser] = useState<any>(null);
  const [loading, setLoading] = useState(true);
  const router = useRouter();

  useEffect(() => {
    async function getUser() {
      const { data: { user } } = await supabase.auth.getUser();
      if (!user) {
        router.push("/login");
      } else {
        setUser(user);
      }
      setLoading(false);
    }
    getUser();
  }, [router]);

  const handleLogout = async () => {
    await supabase.auth.signOut();
    router.push("/");
  };

  if (loading) return (
    <div className="min-h-screen flex items-center justify-center bg-gray-50">
      <div className="w-10 h-10 border-4 border-rose-100 border-t-rose-600 rounded-full animate-spin"></div>
    </div>
  );

  return (
    <div className="min-h-screen bg-[#fafafa]">
      <Navbar />

      <main className="max-w-6xl mx-auto px-4 py-32">
        <div className="flex flex-col md:flex-row gap-8 items-start">
            {/* Sidebar-like Profile Card */}
            <div className="w-full md:w-80 bg-white rounded-[2.5rem] p-8 shadow-xl shadow-gray-200/50 border border-gray-100 flex flex-col items-center text-center sticky top-32">
                <div className="w-24 h-24 bg-gradient-to-tr from-rose-500 to-rose-600 rounded-3xl rotate-3 flex items-center justify-center text-white text-3xl font-black shadow-lg shadow-rose-200 mb-6">
                    {user?.email?.[0].toUpperCase()}
                </div>
                <h2 className="text-xl font-black text-gray-900 leading-tight">{user?.user_metadata?.full_name || user?.email?.split('@')[0]}</h2>
                <p className="text-gray-400 text-sm font-medium mt-1">{user?.email}</p>
                
                <div className="w-full mt-8 pt-8 border-t border-gray-50 space-y-3">
                    <Link href="/profile/edit" className="flex items-center gap-3 px-6 py-3.5 bg-gray-50 hover:bg-rose-50 rounded-2xl text-xs font-black uppercase tracking-widest text-gray-500 hover:text-rose-600 transition-all group">
                        <span className="text-lg group-hover:scale-110 transition-transform">⚙️</span> Pengaturan Akun
                    </Link>
                    <button 
                        onClick={handleLogout}
                        className="w-full flex items-center gap-3 px-6 py-3.5 bg-gray-50 hover:bg-rose-50 rounded-2xl text-xs font-black uppercase tracking-widest text-gray-500 hover:text-rose-600 transition-all group"
                    >
                        <span className="text-lg group-hover:scale-110 transition-transform">🚪</span> Keluar Sesi
                    </button>
                    <Link href="/menu" className="flex lg:hidden items-center gap-3 px-6 py-3.5 bg-rose-600 text-white rounded-2xl text-xs font-black uppercase tracking-widest hover:bg-rose-700 transition-all shadow-lg shadow-rose-100">
                        <span className="text-lg">🍕</span> Pesan Sekarang
                    </Link>
                </div>
            </div>

            {/* Main Dashboard Content */}
            <div className="flex-1 space-y-8 w-full">
                {/* Stats Grid */}
                <div className="grid grid-cols-1 sm:grid-cols-2 gap-6">
                    <div className="bg-white p-8 rounded-[2.5rem] shadow-xl shadow-gray-100 border border-gray-100 relative overflow-hidden group hover:-translate-y-1 transition-all duration-500">
                        <div className="absolute top-0 right-0 w-32 h-32 bg-rose-50 rounded-bl-[4rem] -z-0 opacity-50 group-hover:scale-110 transition-transform"></div>
                        <p className="text-[10px] font-black uppercase tracking-widest text-gray-400 mb-2 relative z-10">Saldo BitePay</p>
                        <p className="text-3xl font-black text-gray-900 relative z-10">Rp 0</p>
                        <button className="mt-6 text-xs font-black text-rose-600 uppercase tracking-widest relative z-10 flex items-center gap-2 hover:gap-3 transition-all">
                            Isi Saldo <span className="text-lg">➔</span>
                        </button>
                    </div>

                    <div className="bg-gray-950 p-8 rounded-[2.5rem] shadow-xl shadow-gray-300 border border-gray-800 relative overflow-hidden group hover:-translate-y-1 transition-all duration-500">
                        <div className="absolute top-0 right-0 w-32 h-32 bg-gray-900 rounded-bl-[4rem] -z-0 opacity-50 group-hover:scale-110 transition-transform"></div>
                        <p className="text-[10px] font-black uppercase tracking-widest text-gray-400 mb-2 relative z-10">Tribite Points</p>
                        <p className="text-3xl font-black text-white relative z-10">0 Pts</p>
                        <button className="mt-6 text-xs font-black text-rose-500 uppercase tracking-widest relative z-10 flex items-center gap-2 hover:gap-3 transition-all">
                            Tukar Points <span className="text-lg">➔</span>
                        </button>
                    </div>
                </div>

                {/* History Section */}
                <div className="bg-white rounded-[2.5rem] p-8 shadow-xl shadow-gray-100 border border-gray-100">
                    <div className="flex justify-between items-center mb-8">
                        <h3 className="text-lg font-black text-gray-900 uppercase tracking-tight">Riwayat Pesanan</h3>
                        <Link href="/orders" className="text-xs font-black text-rose-600 uppercase tracking-widest hover:underline">Lihat Semua</Link>
                    </div>

                    <div className="space-y-4">
                        <div className="p-10 border-2 border-dashed border-gray-100 rounded-[2.5rem] text-center">
                            <p className="text-xs font-bold text-gray-400 uppercase tracking-widest">Belum ada riwayat pesanan</p>
                            <Link href="/menu" className="mt-4 inline-block text-[10px] font-black uppercase tracking-widest text-rose-600 hover:text-rose-700 transition-colors underline decoration-2 underline-offset-4">
                                Mulai Pesan Sekarang →
                            </Link>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      </main>
    </div>
  );
}
