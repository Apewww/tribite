"use client";

import { useState, useEffect, use } from "react";
import { supabase } from "@/lib/supabase";
import { useRouter } from "next/navigation";

export default function EditKatalogPage({ params }: { params: Promise<{ id: string }> }) {
  const { id } = use(params);
  const [categories, setCategories] = useState<any[]>([]);
  const [loading, setLoading] = useState(true);
  const [saving, setSaving] = useState(false);
  const router = useRouter();

  const [formData, setFormData] = useState({
    nama: "",
    deskripsi: "",
    harga: 0,
    kategori_id: "",
    gambar: "",
    status: "aktif",
  });

  useEffect(() => {
    async function fetchData() {
      const [{ data: catData }, { data: prodData }] = await Promise.all([
        supabase.from("kategori").select("*"),
        supabase.from("katalog").select("*").eq("id", id).single(),
      ]);

      setCategories(catData || []);
      if (prodData) {
        setFormData({
          nama: prodData.nama,
          deskripsi: prodData.deskripsi || "",
          harga: prodData.harga,
          kategori_id: prodData.kategori_id?.toString() || "",
          gambar: prodData.gambar || "",
          status: prodData.status,
        });
      }
      setLoading(false);
    }
    fetchData();
  }, [id]);

  const handleSubmit = async (e: React.FormEvent) => {
    e.preventDefault();
    setSaving(true);

    const { error } = await supabase
      .from("katalog")
      .update({
        ...formData,
        kategori_id: formData.kategori_id ? parseInt(formData.kategori_id) : null,
      })
      .eq("id", id);

    if (error) {
      alert("Gagal mengupdate menu: " + error.message);
    } else {
      router.push("/admin/katalog");
    }
    setSaving(false);
  };

  if (loading) return <div className="p-10 text-white">Loading...</div>;

  return (
    <div className="max-w-2xl">
      <h1 className="text-3xl font-black mb-8">Edit Menu</h1>

      <form onSubmit={handleSubmit} className="space-y-6 bg-gray-800 p-8 rounded-[2rem] border border-gray-700 shadow-2xl text-white">
        <div className="space-y-2">
          <label className="text-xs font-black uppercase tracking-widest text-gray-400">Nama Menu</label>
          <input
            type="text"
            required
            className="w-full bg-gray-900 border border-gray-700 rounded-2xl px-5 py-3 focus:outline-none focus:border-rose-600 transition-colors"
            value={formData.nama}
            onChange={(e) => setFormData({ ...formData, nama: e.target.value })}
          />
        </div>

        {/* ... (repeat fields from add/page.tsx) ... */}
        <div className="space-y-2">
          <label className="text-xs font-black uppercase tracking-widest text-gray-400">Deskripsi</label>
          <textarea
            className="w-full bg-gray-900 border border-gray-700 rounded-2xl px-5 py-3 focus:outline-none focus:border-rose-600 transition-colors min-h-[100px]"
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
          <label className="text-xs font-black uppercase tracking-widest text-gray-400">Status</label>
          <select
            className="w-full bg-gray-900 border border-gray-700 rounded-2xl px-5 py-3 focus:outline-none focus:border-rose-600 transition-colors appearance-none"
            value={formData.status}
            onChange={(e) => setFormData({ ...formData, status: e.target.value })}
          >
            <option value="aktif">Aktif</option>
            <option value="nonaktif">Non-aktif</option>
          </select>
        </div>

        <div className="pt-4 flex gap-4">
          <button
            type="submit"
            disabled={saving}
            className="flex-1 py-4 bg-rose-600 text-white rounded-2xl font-bold hover:bg-rose-700 active:scale-95 transition-all shadow-lg shadow-rose-900/20 disabled:opacity-50"
          >
            {saving ? "Menyimpan..." : "Update Menu"}
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
