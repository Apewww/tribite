"use client";

import { useState } from "react";
import Link from "next/link";
import { supabase } from "@/lib/supabase";
import { useRouter } from "next/navigation";

export default function RegisterPage() {
  const [formData, setFormData] = useState({
    name: "",
    email: "",
    password: "",
    phone: "",
  });
  const [loading, setLoading] = useState(false);
  const [error, setError] = useState<string | null>(null);
  const router = useRouter();

  const handleRegister = async (e: React.FormEvent) => {
    e.preventDefault();
    setLoading(true);
    setError(null);

    const { error: signUpError } = await supabase.auth.signUp({
      email: formData.email,
      password: formData.password,
      options: {
        data: {
          full_name: formData.name,
          phone: formData.phone,
        },
      },
    });

    if (signUpError) {
      setError(signUpError.message);
      setLoading(false);
    } else {
      // Create user record in 'akun' table if needed, though Supabase Auth handles it.
      // But typically we want to sync with our custom table for POS logic.
      router.push("/login?registered=true");
    }
  };

  return (
    <div className="min-h-screen flex flex-col items-center justify-center bg-gray-50 px-4 py-12">
      <div className="max-w-md w-full space-y-8 bg-white p-8 rounded-3xl shadow-xl shadow-gray-200 border border-gray-100">
        <div className="text-center">
          <Link href="/" className="inline-flex items-center gap-2 mb-6">
            <div className="w-10 h-10 bg-rose-600 rounded-xl rotate-3 flex items-center justify-center">
              <span className="text-white font-bold text-xl">T</span>
            </div>
            <span className="text-2xl font-bold tracking-tight">TRIBITE</span>
          </Link>
          <h2 className="text-3xl font-extrabold text-gray-900">Buat Akun Baru</h2>
          <p className="mt-2 text-sm text-gray-600">
            Mulai pengalaman kuliner Anda yang menyenangkan
          </p>
        </div>

        <form className="mt-8 space-y-4" onSubmit={handleRegister}>
          {error && (
            <div className="bg-rose-50 border border-rose-100 text-rose-600 px-4 py-3 rounded-xl text-sm">
              {error}
            </div>
          )}
          
          <div>
            <label className="text-sm font-medium text-gray-700 block mb-1">Nama Lengkap</label>
            <input
              type="text"
              required
              value={formData.name}
              onChange={(e) => setFormData({ ...formData, name: e.target.value })}
              className="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-rose-500 focus:border-rose-500 transition-all outline-none"
              placeholder="Jhon Doe"
            />
          </div>

          <div>
            <label className="text-sm font-medium text-gray-700 block mb-1">Email</label>
            <input
              type="email"
              required
              value={formData.email}
              onChange={(e) => setFormData({ ...formData, email: e.target.value })}
              className="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-rose-500 focus:border-rose-500 transition-all outline-none"
              placeholder="nama@email.com"
            />
          </div>

          <div>
            <label className="text-sm font-medium text-gray-700 block mb-1">Telepon</label>
            <input
              type="tel"
              required
              value={formData.phone}
              onChange={(e) => setFormData({ ...formData, phone: e.target.value })}
              className="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-rose-500 focus:border-rose-500 transition-all outline-none"
              placeholder="+62 8..."
            />
          </div>

          <div>
            <label className="text-sm font-medium text-gray-700 block mb-1">Password</label>
            <input
              type="password"
              required
              value={formData.password}
              onChange={(e) => setFormData({ ...formData, password: e.target.value })}
              className="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-rose-500 focus:border-rose-500 transition-all outline-none"
              placeholder="••••••••"
            />
          </div>

          <button
            type="submit"
            disabled={loading}
            className="w-full mt-4 py-4 px-6 text-white bg-rose-600 hover:bg-rose-700 disabled:bg-rose-300 rounded-2xl font-bold shadow-lg shadow-rose-200 transition-all active:scale-95 flex items-center justify-center gap-2"
          >
            {loading ? (
              <div className="w-5 h-5 border-2 border-white/30 border-t-white rounded-full animate-spin"></div>
            ) : null}
            Daftar Sekarang
          </button>
        </form>

        <p className="text-center text-sm text-gray-600">
          Sudah punya akun?{" "}
          <Link href="/login" className="font-bold text-rose-600 hover:text-rose-500 transition-colors">
            Masuk
          </Link>
        </p>
      </div>
    </div>
  );
}
