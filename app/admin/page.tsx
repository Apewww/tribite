"use client";

import { useEffect, useState } from "react";
import { supabase } from "@/lib/supabase";

export default function AdminDashboard() {
  const [stats, setStats] = useState({
    totalKatalog: 0,
    totalAkun: 0,
    totalKategori: 0,
  });

  useEffect(() => {
    async function fetchStats() {
      const { count: katalogCount } = await supabase.from("katalog").select("*", { count: "exact", head: true });
      const { count: akunCount } = await supabase.from("akun").select("*", { count: "exact", head: true });
      const { count: kategoriCount } = await supabase.from("kategori").select("*", { count: "exact", head: true });

      setStats({
        totalKatalog: katalogCount || 0,
        totalAkun: akunCount || 0,
        totalKategori: kategoriCount || 0,
      });
    }
    fetchStats();
  }, []);

  return (
    <div className="space-y-10">
      <div className="flex justify-between items-center">
        <div>
          <h1 className="text-4xl font-black tracking-tight">Dashboard Overview</h1>
          <p className="text-gray-400 mt-1">Status sistem dan ringkasan data Tribite saat ini.</p>
        </div>
        <div className="flex gap-2">
            <div className="w-2 h-2 bg-green-500 rounded-full animate-pulse"></div>
            <span className="text-[10px] uppercase font-black tracking-widest text-green-500">Sistem Aktif</span>
        </div>
      </div>

      <div className="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div className="bg-gray-800 border border-gray-700 p-8 rounded-3xl group hover:border-rose-600 transition-all cursor-pointer shadow-2xl">
          <p className="text-xs font-black text-gray-500 uppercase tracking-widest mb-1">Total Katalog</p>
          <div className="flex items-center justify-between">
            <p className="text-5xl font-black group-hover:scale-110 transition-transform origin-left">{stats.totalKatalog}</p>
            <span className="text-4xl opacity-20 transition-opacity group-hover:opacity-100">🍔</span>
          </div>
        </div>
        <div className="bg-gray-800 border border-gray-700 p-8 rounded-3xl group hover:border-blue-500 transition-all cursor-pointer shadow-2xl">
          <p className="text-xs font-black text-gray-500 uppercase tracking-widest mb-1">Total Akun</p>
          <div className="flex items-center justify-between">
            <p className="text-5xl font-black group-hover:scale-110 transition-transform origin-left">{stats.totalAkun}</p>
            <span className="text-4xl opacity-20 transition-opacity group-hover:opacity-100">👤</span>
          </div>
        </div>
        <div className="bg-gray-800 border border-gray-700 p-8 rounded-3xl group hover:border-yellow-500 transition-all cursor-pointer shadow-2xl">
          <p className="text-xs font-black text-gray-500 uppercase tracking-widest mb-1">Total Kategori</p>
          <div className="flex items-center justify-between">
            <p className="text-5xl font-black group-hover:scale-110 transition-transform origin-left">{stats.totalKategori}</p>
            <span className="text-4xl opacity-20 transition-opacity group-hover:opacity-100">📂</span>
          </div>
        </div>
      </div>

      <div className="p-10 bg-gray-950 rounded-[3rem] border border-gray-800 border-dashed text-center">
         <p className="text-gray-600 font-bold uppercase tracking-widest text-sm">Log Aktivitas Terbaru</p>
         <p className="text-gray-400 mt-4 italic">Semua sistem berjalan normal. Tidak ada aktivitas mencurigakan.</p>
      </div>
    </div>
  );
}
