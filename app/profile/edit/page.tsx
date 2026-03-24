"use client";

import { useEffect, useState } from "react";
import { supabase } from "@/lib/supabase";
import { useRouter } from "next/navigation";
import { Navbar } from "@/components/navbar";

export default function ProfileEditPage() {
  const [profile, setProfile] = useState<any>(null);
  const [loading, setLoading] = useState(true);
  const [saving, setSaving] = useState(false);
  const router = useRouter();

  const [formData, setFormData] = useState({
    nama: "",
    telepon: "",
    alamat: "",
    metode_pembayaran: "",
  });

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

      if (data) {
        setProfile(data);
        setFormData({
          nama: data.nama || "",
          telepon: data.telepon || "",
          alamat: data.alamat || "",
          metode_pembayaran: data.metode_pembayaran || "",
        });
      }
      setLoading(false);
    }
    fetchProfile();
  }, [router]);

  const handleSubmit = async (e: React.FormEvent) => {
    e.preventDefault();
    setSaving(true);

    const { error } = await supabase
      .from("akun")
      .update(formData)
      .eq("id", profile.id);

    if (error) {
      alert("Gagal mengupdate profil: " + error.message);
    } else {
      router.push("/profile");
    }
    setSaving(false);
  };

  if (loading) return <div className="min-h-screen flex items-center justify-center">Loading...</div>;

  return (
    <div className="min-h-screen bg-white">
      <Navbar />

      <main className="max-w-2xl mx-auto px-4 py-32">
        <h1 className="text-3xl font-black mb-8">Edit Profil</h1>

        <form onSubmit={handleSubmit} className="space-y-6">
          <div className="space-y-2">
            <label className="text-[10px] font-black uppercase tracking-widest text-gray-400">Nama Lengkap</label>
            <input
              type="text"
              required
              className="w-full bg-gray-50 border border-gray-100 rounded-2xl px-5 py-4 focus:outline-none focus:border-rose-600 transition-colors font-black"
              value={formData.nama}
              onChange={(e) => setFormData({ ...formData, nama: e.target.value })}
            />
          </div>

          <div className="space-y-2">
            <label className="text-[10px] font-black uppercase tracking-widest text-gray-400">Nomor Telepon</label>
            <input
              type="text"
              className="w-full bg-gray-50 border border-gray-100 rounded-2xl px-5 py-4 focus:outline-none focus:border-rose-600 transition-colors font-black"
              value={formData.telepon}
              onChange={(e) => setFormData({ ...formData, telepon: e.target.value })}
            />
          </div>

          <div className="space-y-2">
            <label className="text-[10px] font-black uppercase tracking-widest text-gray-400">Alamat Pengiriman</label>
            <textarea
              className="w-full bg-gray-50 border border-gray-100 rounded-2xl px-5 py-4 focus:outline-none focus:border-rose-600 transition-colors font-black min-h-[100px]"
              value={formData.alamat}
              onChange={(e) => setFormData({ ...formData, alamat: e.target.value })}
            />
          </div>

          <div className="space-y-2">
            <label className="text-[10px] font-black uppercase tracking-widest text-gray-400">Metode Pembayaran</label>
            <select
              className="w-full bg-gray-50 border border-gray-100 rounded-2xl px-5 py-4 focus:outline-none focus:border-rose-600 transition-colors font-black appearance-none uppercase tracking-tighter"
              value={formData.metode_pembayaran}
              onChange={(e) => setFormData({ ...formData, metode_pembayaran: e.target.value })}
            >
              <option value="">Pilih Metode</option>
              <option value="cash">Tunai (Cash)</option>
              <option value="bitepay">BitePay</option>
              <option value="qris">QRIS</option>
            </select>
          </div>

          <div className="pt-8 flex flex-col gap-3">
            <button
              type="submit"
              disabled={saving}
              className="w-full py-4 bg-gray-950 text-white rounded-2xl font-bold hover:bg-rose-600 transition-all active:scale-95 shadow-xl shadow-gray-200"
            >
              {saving ? "Menyimpan..." : "Simpan Perubahan"}
            </button>
            <button
              type="button"
              onClick={() => router.back()}
              className="w-full py-4 bg-white text-gray-500 rounded-2xl font-bold hover:text-gray-950 transition-all"
            >
              Batal
            </button>
          </div>
        </form>
      </main>
    </div>
  );
}
