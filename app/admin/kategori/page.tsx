"use client";

import { useEffect, useState } from "react";
import { supabase } from "@/lib/supabase";

interface Category {
  id: number;
  nama: string;
  deskripsi: string;
}

export default function AdminKategori() {
  const [categories, setCategories] = useState<Category[]>([]);
  const [loading, setLoading] = useState(true);
  const [newCat, setNewCat] = useState({ nama: "", deskripsi: "" });

  useEffect(() => {
    fetchCategories();
  }, []);

  const fetchCategories = async () => {
    const { data } = await supabase.from("kategori").select("*").order("id", { ascending: true });
    setCategories(data || []);
    setLoading(false);
  };

  const handleCreate = async (e: React.FormEvent) => {
    e.preventDefault();
    const { error } = await supabase.from("kategori").insert([newCat]);
    if (error) alert(error.message);
    else {
      setNewCat({ nama: "", deskripsi: "" });
      fetchCategories();
    }
  };

  const handleDelete = async (id: number) => {
    if (confirm("Hapus kategori ini?")) {
      await supabase.from("kategori").delete().eq("id", id);
      fetchCategories();
    }
  };

  return (
    <div className="space-y-8">
      <div>
        <h1 className="text-3xl font-black tracking-tight">Manajemen Kategori</h1>
        <p className="text-gray-400 mt-1">Kelola kategori makanan dan minuman.</p>
      </div>

      <div className="grid grid-cols-1 md:grid-cols-3 gap-8">
        <div className="md:col-span-1">
          <form onSubmit={handleCreate} className="bg-gray-800 p-8 rounded-[2rem] border border-gray-700 shadow-2xl space-y-4">
            <h3 className="font-black uppercase tracking-widest text-sm text-rose-500">Kategori Baru</h3>
            <div className="space-y-1">
              <label className="text-[10px] uppercase font-black text-gray-500 tracking-widest">Nama</label>
              <input 
                required 
                className="w-full bg-gray-900 border border-gray-700 rounded-xl px-4 py-2 text-sm focus:border-rose-600 outline-none" 
                value={newCat.nama}
                onChange={(e) => setNewCat({...newCat, nama: e.target.value})}
              />
            </div>
            <div className="space-y-1">
              <label className="text-[10px] uppercase font-black text-gray-500 tracking-widest">Deskripsi</label>
              <input 
                className="w-full bg-gray-900 border border-gray-700 rounded-xl px-4 py-2 text-sm focus:border-rose-600 outline-none" 
                value={newCat.deskripsi}
                onChange={(e) => setNewCat({...newCat, deskripsi: e.target.value})}
              />
            </div>
            <button className="w-full py-3 bg-rose-600 text-white rounded-xl font-bold shadow-lg shadow-rose-900/20 hover:bg-rose-700 transition-all active:scale-95">
               Simpan Kategori
            </button>
          </form>
        </div>

        <div className="md:col-span-2">
            <div className="bg-gray-800 border border-gray-700 rounded-3xl overflow-hidden shadow-2xl">
                <table className="w-full text-left">
                  <thead className="bg-gray-900 border-b border-gray-700">
                    <tr>
                      <th className="px-6 py-4 text-[10px] font-black uppercase tracking-widest text-gray-500">ID</th>
                      <th className="px-6 py-4 text-[10px] font-black uppercase tracking-widest text-gray-500">Nama</th>
                      <th className="px-6 py-4 text-right text-[10px] font-black uppercase tracking-widest text-gray-500">Aksi</th>
                    </tr>
                  </thead>
                  <tbody className="divide-y divide-gray-700">
                    {loading ? (
                        <tr><td colSpan={3} className="p-10 text-center animate-pulse text-gray-600">Loading...</td></tr>
                    ) : categories.map(cat => (
                        <tr key={cat.id} className="hover:bg-gray-700/50 transition-colors group">
                            <td className="px-6 py-4 text-xs font-bold text-gray-500">{cat.id}</td>
                            <td className="px-6 py-4">
                                <p className="text-xs font-black uppercase tracking-wider text-gray-100">{cat.nama}</p>
                                <p className="text-[10px] text-gray-500">{cat.deskripsi}</p>
                            </td>
                            <td className="px-6 py-4 text-right">
                                <button onClick={() => handleDelete(cat.id)} className="text-[10px] font-black text-rose-500 hover:text-rose-400 uppercase tracking-widest opacity-0 group-hover:opacity-100 transition-opacity">Hapus</button>
                            </td>
                        </tr>
                    ))}
                  </tbody>
                </table>
            </div>
        </div>
      </div>
    </div>
  );
}
