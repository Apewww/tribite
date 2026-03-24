"use client";

import { useEffect, useState } from "react";
import { supabase } from "@/lib/supabase";
import { Navbar } from "@/components/navbar";
import Link from "next/link";

export const dynamic = "force-dynamic";

export default function OrdersPage() {
  const [orders, setOrders] = useState<any[]>([]);
  const [loading, setLoading] = useState(true);

  useEffect(() => {
    async function fetchOrders() {
      const { data: { user } } = await supabase.auth.getUser();
      if (!user) return;

      const { data, error } = await supabase
        .from("pesanan")
        .select(`
          id,
          total_harga,
          status,
          created_at,
          detail_pesanan (
            quantity,
            harga_satuan,
            katalog (nama)
          )
        `)
        .eq("user_id", user.id)
        .order("created_at", { ascending: false });

      if (!error) {
        setOrders(data || []);
      }
      setLoading(false);
    }
    fetchOrders();
  }, []);

  if (loading) return (
    <div className="min-h-screen flex items-center justify-center bg-[#fafafa]">
      <div className="w-10 h-10 border-4 border-rose-100 border-t-rose-600 rounded-full animate-spin"></div>
    </div>
  );

  return (
    <div className="min-h-screen bg-[#fafafa] pb-20">
      <Navbar />

      <main className="max-w-4xl mx-auto px-4 mt-32">
        <div className="mb-12">
            <h1 className="text-4xl font-black text-gray-900 tracking-tight">Riwayat Pesanan</h1>
            <p className="text-gray-500 font-medium mt-1">Daftar semua pesanan lezat yang pernah Anda beli.</p>
        </div>

        {orders.length === 0 ? (
          <div className="text-center py-32 bg-white rounded-[3rem] border border-dashed border-gray-200 shadow-sm">
             <div className="text-6xl mb-6">🏜️</div>
             <p className="text-gray-400 font-bold uppercase tracking-widest text-sm">Belum ada pesanan</p>
             <Link href="/menu" className="mt-6 inline-block px-8 py-3 bg-rose-600 text-white rounded-full font-bold shadow-lg shadow-rose-100 hover:bg-rose-700 transition-all active:scale-95 text-xs uppercase tracking-widest">
                Mulai Pesan Sekarang
             </Link>
          </div>
        ) : (
          <div className="space-y-6">
            {orders.map((order) => (
              <div key={order.id} className="bg-white rounded-[2.5rem] shadow-xl shadow-gray-100 border border-gray-100 overflow-hidden group hover:border-rose-200 transition-all duration-500">
                <div className="p-8 flex flex-col md:flex-row justify-between gap-6 border-b border-gray-50 bg-gray-50/50">
                    <div>
                        <p className="text-[10px] font-black uppercase tracking-[0.2em] text-gray-400 mb-1">ID PESANAN</p>
                        <p className="font-black text-gray-900">#TRB-{order.id.toString().padStart(6, '0')}</p>
                    </div>
                    <div>
                        <p className="text-[10px] font-black uppercase tracking-[0.2em] text-gray-400 mb-1">TANGGAL</p>
                        <p className="font-bold text-gray-600 text-sm">
                            {new Date(order.created_at).toLocaleDateString('id-ID', { day: 'numeric', month: 'long', year: 'numeric' })}
                        </p>
                    </div>
                    <div>
                        <p className="text-[10px] font-black uppercase tracking-[0.2em] text-gray-400 mb-1">STATUS</p>
                        <span className={`px-4 py-1.5 rounded-full text-[10px] font-black uppercase tracking-widest border ${
                            order.status === 'selesai' ? 'bg-green-50 text-green-600 border-green-100' : 
                            order.status === 'proses' ? 'bg-blue-50 text-blue-600 border-blue-100' : 
                            'bg-gray-50 text-gray-500 border-gray-100'
                        }`}>
                            {order.status}
                        </span>
                    </div>
                    <div className="text-left md:text-right">
                        <p className="text-[10px] font-black uppercase tracking-[0.2em] text-gray-400 mb-1">TOTAL BAYAR</p>
                        <p className="text-xl font-black text-rose-600">Rp {new Intl.NumberFormat("id-ID").format(order.total_harga)}</p>
                    </div>
                </div>

                <div className="p-8">
                    <p className="text-[10px] font-black uppercase tracking-[0.2em] text-gray-400 mb-6">ITEM PESANAN</p>
                    <div className="space-y-4">
                        {order.detail_pesanan.map((item: any, idx: number) => (
                            <div key={idx} className="flex justify-between items-center group/item transition-all">
                                <div className="flex items-center gap-4">
                                    <div className="w-2 h-2 rounded-full bg-rose-200 group-hover/item:scale-150 group-hover/item:bg-rose-500 transition-all"></div>
                                    <p className="text-sm font-bold text-gray-700">
                                        {item.katalog?.nama} <span className="text-gray-400 ml-2">x{item.quantity}</span>
                                    </p>
                                </div>
                                <p className="text-sm font-black text-gray-900 opacity-60">Rp {new Intl.NumberFormat("id-ID").format(item.harga_satuan * item.quantity)}</p>
                            </div>
                        ))}
                    </div>
                </div>
              </div>
            ))}
          </div>
        )}
      </main>
    </div>
  );
}
