"use client";

import { useEffect, useState } from "react";
import { supabase } from "@/lib/supabase";
import { useRouter } from "next/navigation";
import Link from "next/link";

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
    <div className="min-h-screen bg-gray-50">
      <nav className="bg-white border-b border-gray-100 px-4 h-16 flex items-center justify-between sticky top-0 z-40">
        <Link href="/" className="flex items-center gap-2">
          <div className="w-8 h-8 bg-rose-600 rounded-lg flex items-center justify-center text-white font-bold">T</div>
          <span className="font-bold">TRIBITE</span>
        </Link>
        <button onClick={handleLogout} className="text-xs font-bold text-gray-500 hover:text-rose-600 transition-colors uppercase tracking-widest">Logout</button>
      </nav>

      <main className="max-w-4xl mx-auto px-4 py-12">
        <div className="bg-white rounded-[2rem] p-8 shadow-xl shadow-gray-200/50 border border-gray-100 relative overflow-hidden">
          <div className="absolute top-0 right-0 w-32 h-32 bg-rose-50 rounded-bl-[4rem] -z-0 opacity-50"></div>
          
          <div className="relative z-10">
            <div className="flex items-center gap-6 mb-8">
              <div className="w-20 h-20 bg-gradient-to-tr from-rose-500 to-orange-400 rounded-2xl flex items-center justify-center text-white text-3xl font-extrabold shadow-lg shadow-rose-100">
                {user?.user_metadata?.full_name?.charAt(0) || user?.email?.charAt(0).toUpperCase()}
              </div>
              <div>
                <h1 className="text-2xl font-black text-gray-900">{user?.user_metadata?.full_name || "User Tribite"}</h1>
                <p className="text-gray-500 text-sm font-medium">{user?.email}</p>
                <div className="mt-2 inline-flex items-center px-2 py-0.5 rounded-full bg-green-50 text-green-600 text-[10px] font-bold border border-green-100">
                  {user?.user_metadata?.phone || "Phone Not Set"}
                </div>
              </div>
            </div>

            <div className="grid grid-cols-1 md:grid-cols-2 gap-4">
              <div className="p-6 bg-gray-50 rounded-2xl border border-gray-100 group hover:border-rose-200 transition-all cursor-pointer">
                <p className="text-xs font-bold text-gray-400 uppercase tracking-widest mb-1">Saldo BitePay</p>
                <p className="text-2xl font-black text-rose-600 group-hover:scale-105 transition-transform origin-left">Rp 0</p>
              </div>
              <div className="p-6 bg-gray-50 rounded-2xl border border-gray-100 group hover:border-orange-200 transition-all cursor-pointer">
                <p className="text-xs font-bold text-gray-400 uppercase tracking-widest mb-1">Tribite Points</p>
                <p className="text-2xl font-black text-orange-500 group-hover:scale-105 transition-transform origin-left">0 Pts</p>
              </div>
            </div>

            <div className="mt-8 pt-8 border-t border-gray-50 space-y-2">
               <h3 className="text-sm font-bold text-gray-900 mb-4 uppercase tracking-widest">Aktivitas Terakhir</h3>
               <div className="text-center py-8">
                  <p className="text-sm text-gray-400 italic font-medium">Belum ada riwayat pesanan.</p>
                  <Link href="/menu" className="mt-4 inline-block text-sm font-bold text-rose-600 hover:rose-700 transition-colors underline decoration-2 underline-offset-4">Mulai Pesan Sekarang →</Link>
               </div>
            </div>
          </div>
        </div>
      </main>
    </div>
  );
}
