"use client";

import { useEffect, useState } from "react";
import { supabase } from "@/lib/supabase";
import Link from "next/link";

interface Product {
  id: number;
  nama: string;
  harga: number;
  status: string;
  kategori_id: number;
}

export const dynamic = "force-dynamic";

export default function AdminKatalog() {
  const [products, setProducts] = useState<Product[]>([]);
  const [loading, setLoading] = useState(true);

  useEffect(() => {
    async function fetchProducts() {
      const { data, error } = await supabase
        .from("katalog")
        .select("id, nama, harga, status, kategori_id")
        .neq("status", "deleted");

      if (error) {
        console.error("Error fetching products:", error);
      } else {
        setProducts(data || []);
      }
      setLoading(false);
    }
    fetchProducts();
  }, []);

  const handleDelete = async (id: number) => {
     if (confirm("Apakah Anda yakin ingin menghapus item ini?")) {
        const { error } = await supabase
          .from("katalog")
          .update({ status: "deleted" })
          .eq("id", id);
        
        if (error) {
           alert("Gagal menghapus: " + error.message);
        } else {
           setProducts(products.filter(p => p.id !== id));
        }
     }
  };

  return (
    <div className="space-y-8">
      <div className="flex justify-between items-center">
        <div>
          <h1 className="text-3xl font-black tracking-tight">Manajemen Katalog</h1>
          <p className="text-gray-400 mt-1">Kelola menu makanan dan minuman Tribite.</p>
        </div>
        <Link href="/admin/katalog/add" className="px-6 py-3 bg-rose-600 text-white rounded-2xl font-bold shadow-lg shadow-rose-900/40 hover:bg-rose-700 transition-all active:scale-95 flex items-center gap-2">
           <span className="text-xl">+</span> Tambah Menu Baru
        </Link>
      </div>

      <div className="bg-gray-800 border border-gray-700 rounded-3xl overflow-hidden shadow-2xl">
        <table className="w-full text-left">
          <thead>
            <tr className="bg-gray-900 border-b border-gray-700">
              <th className="px-6 py-4 text-xs font-black uppercase tracking-widest text-gray-500">Menu</th>
              <th className="px-6 py-4 text-xs font-black uppercase tracking-widest text-gray-500">Harga</th>
              <th className="px-6 py-4 text-xs font-black uppercase tracking-widest text-gray-500">Status</th>
              <th className="px-6 py-4 text-xs font-black uppercase tracking-widest text-gray-500 text-right">Aksi</th>
            </tr>
          </thead>
          <tbody className="divide-y divide-gray-700">
            {loading ? (
              [...Array(5)].map((_, i) => (
                <tr key={i} className="animate-pulse">
                  <td className="px-6 py-4"><div className="h-4 bg-gray-700 rounded w-1/2"></div></td>
                  <td className="px-6 py-4"><div className="h-4 bg-gray-700 rounded w-1/4"></div></td>
                  <td className="px-6 py-4"><div className="h-4 bg-gray-700 rounded w-1/4"></div></td>
                  <td className="px-6 py-4 text-right"><div className="h-4 bg-gray-700 rounded w-20 ml-auto"></div></td>
                </tr>
              ))
            ) : products.map((product) => (
              <tr key={product.id} className="hover:bg-gray-700/50 transition-colors group">
                <td className="px-6 py-4 font-bold text-gray-100 uppercase text-xs tracking-wider">{product.nama}</td>
                <td className="px-6 py-4 font-medium text-gray-400">Rp {new Intl.NumberFormat("id-ID").format(product.harga)}</td>
                <td className="px-6 py-4">
                  <span className={`px-2 py-0.5 rounded-full text-[10px] font-black uppercase tracking-widest border ${
                    product.status === "aktif" ? "bg-green-500/10 text-green-500 border-green-500/20" : "bg-yellow-500/10 text-yellow-500 border-yellow-500/20"
                  }`}>
                    {product.status}
                  </span>
                </td>
                <td className="px-6 py-4 text-right space-x-3">
                  <Link href={`/admin/katalog/edit/${product.id}`} className="text-xs font-black text-blue-500 hover:underline uppercase tracking-widest">Edit</Link>
                  <button onClick={() => handleDelete(product.id)} className="text-xs font-black text-rose-500 hover:underline uppercase tracking-widest opacity-0 group-hover:opacity-100 transition-opacity">Hapus</button>
                </td>
              </tr>
            ))}
          </tbody>
        </table>
        {!loading && products.length === 0 && (
          <div className="p-10 text-center text-gray-500 italic font-medium">
             Belum ada menu di katalog.
          </div>
        )}
      </div>
    </div>
  );
}
