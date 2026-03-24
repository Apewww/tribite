"use client";

import { useState, useEffect } from "react";
import { supabase } from "@/lib/supabase";
import { useRouter } from "next/navigation";

export default function AddKatalogPage() {
  const [categories, setCategories] = useState<any[]>([]);
  const [loading, setLoading] = useState(false);
  const router = useRouter();

  const [formData, setFormData] = useState({
    nama: "",
    deskripsi: "",
    harga: 0,
    kategori_id: "",
    gambar: "",
  });

  useEffect(() => {
    async function fetchCategories() {
      const { data } = await supabase.from("kategori").select("*");
      setCategories(data || []);
    }
    fetchCategories();
  }, []);

  const handleSubmit = async (e: React.FormEvent) => {
    e.preventDefault();
    setLoading(true);

    const { error } = await supabase.from("katalog").insert([
      {
        ...formData,
        kategori_id: formData.kategori_id ? parseInt(formData.kategori_id) : null,
        status: "aktif",
      },
    ]);

    if (error) {
      alert("Gagal menambahkan menu: " + error.message);
    } else {
      router.push("/admin/katalog");
    }
    setLoading(false);
  };

  return (
    <div className="max-w-2xl">
      <h1 className="text-3xl font-black mb-8">Tambah Menu Baru</h1>

      <form onSubmit={handleSubmit} className="space-y-6 bg-gray-800 p-8 rounded-[2rem] border border-gray-700 shadow-2xl">
        <div className="space-y-2">
          <label className="text-xs font-black uppercase tracking-widest text-gray-400">Nama Menu</label>
          <input
            type="text"
            required
            className="w-full bg-gray-900 border border-gray-700 rounded-2xl px-5 py-3 focus:outline-none focus:border-rose-600 transition-colors"
            placeholder="Contoh: Nasi Goreng Gila"
            value={formData.nama}
            onChange={(e) => setFormData({ ...formData, nama: e.target.value })}
          />
        </div>

        <div className="space-y-2">
          <label className="text-xs font-black uppercase tracking-widest text-gray-400">Deskripsi</label>
          <textarea
            className="w-full bg-gray-900 border border-gray-700 rounded-2xl px-5 py-3 focus:outline-none focus:border-rose-600 transition-colors min-h-[100px]"
            placeholder="Ceritakan tentang menu ini..."
            value={formData.deskripsi}
            onChange={(e) => setFormData({ ...formData, deskripsi: e.target.value })}
          />
        </div>

        <div className="grid grid-cols-2 gap-6">
          <div className="space-y-2">
            <label className="text-xs font-black uppercase tracking-widest text-gray-400">Harga (Rp)</label>
            <input
              type="number"
              required
              className="w-full bg-gray-900 border border-gray-700 rounded-2xl px-5 py-3 focus:outline-none focus:border-rose-600 transition-colors"
              value={formData.harga}
              onChange={(e) => setFormData({ ...formData, harga: parseInt(e.target.value) })}
            />
          </div>
          <div className="space-y-2">
            <label className="text-xs font-black uppercase tracking-widest text-gray-400">Kategori</label>
            <select
              className="w-full bg-gray-900 border border-gray-700 rounded-2xl px-5 py-3 focus:outline-none focus:border-rose-600 transition-colors appearance-none"
              value={formData.kategori_id}
              onChange={(e) => setFormData({ ...formData, kategori_id: e.target.value })}
            >
              <option value="">Pilih Kategori</option>
              {categories.map((cat) => (
                <option key={cat.id} value={cat.id}>{cat.nama}</option>
              ))}
            </select>
          </div>
        </div>

        <div className="space-y-2">
          <label className="text-xs font-black uppercase tracking-widest text-gray-400">URL Gambar</label>
          <input
            type="text"
            className="w-full bg-gray-900 border border-gray-700 rounded-2xl px-5 py-3 focus:outline-none focus:border-rose-600 transition-colors"
            placeholder="https://example.com/image.jpg"
            value={formData.gambar}
            onChange={(e) => setFormData({ ...formData, gambar: e.target.value })}
          />
        </div>

        <div className="pt-4 flex gap-4">
          <button
            type="submit"
            disabled={loading}
            className="flex-1 py-4 bg-rose-600 text-white rounded-2xl font-bold hover:bg-rose-700 active:scale-95 transition-all shadow-lg shadow-rose-900/20 disabled:opacity-50"
          >
            {loading ? "Menyimpan..." : "Simpan Menu"}
          </button>
          <button
            type="button"
            onClick={() => router.back()}
            className="flex-1 py-4 bg-gray-700 text-white rounded-2xl font-bold hover:bg-gray-600 active:scale-95 transition-all"
          >
            Batal
          </button>
        </div>
      </form>
    </div>
  );
}
