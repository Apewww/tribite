"use client";

import { useState } from "react";
import Link from "next/link";
import { supabase } from "@/lib/supabase";
import { useRouter } from "next/navigation";

export default function LoginPage() {
  const [email, setEmail] = useState("");
  const [password, setPassword] = useState("");
  const [loading, setLoading] = useState(false);
  const [error, setError] = useState<string | null>(null);
  const router = useRouter();

  const handleLogin = async (e: React.FormEvent) => {
    e.preventDefault();
    setLoading(true);
    setError(null);

    const { error } = await supabase.auth.signInWithPassword({
      email,
      password,
    });

    if (error) {
      setError(error.message);
      setLoading(false);
    } else {
      router.push("/dashboard");
    }
  };

  return (
    <div className="min-h-screen flex flex-col items-center justify-center bg-gray-50 px-4">
      <div className="max-w-md w-full space-y-8 bg-white p-8 rounded-3xl shadow-xl shadow-gray-200 border border-gray-100">
        <div className="text-center">
          <Link href="/" className="inline-flex items-center gap-2 mb-6">
            <div className="w-10 h-10 bg-rose-600 rounded-xl rotate-3 flex items-center justify-center">
              <span className="text-white font-bold text-xl">T</span>
            </div>
            <span className="text-2xl font-bold tracking-tight">TRIBITE</span>
          </Link>
          <h2 className="text-3xl font-extrabold text-gray-900">Selamat Datang Kembali</h2>
          <p className="mt-2 text-sm text-gray-600">
            Masuk untuk melanjutkan pesanan Anda
          </p>
        </div>

        <form className="mt-8 space-y-6" onSubmit={handleLogin}>
          {error && (
            <div className="bg-rose-50 border border-rose-100 text-rose-600 px-4 py-3 rounded-xl text-sm animate-shake">
              {error}
            </div>
          )}
          <div className="space-y-4">
            <div>
              <label className="text-sm font-medium text-gray-700 block mb-1">Email</label>
              <input
                type="email"
                required
                value={email}
                onChange={(e) => setEmail(e.target.value)}
                className="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-rose-500 focus:border-rose-500 transition-all outline-none"
                placeholder="nama@email.com"
              />
            </div>
            <div>
              <label className="text-sm font-medium text-gray-700 block mb-1">Password</label>
              <input
                type="password"
                required
                value={password}
                onChange={(e) => setPassword(e.target.value)}
                className="w-full px-4 py-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-rose-500 focus:border-rose-500 transition-all outline-none"
                placeholder="••••••••"
              />
            </div>
          </div>

          <div className="flex items-center justify-between">
            <div className="flex items-center">
              <input
                id="remember-me"
                type="checkbox"
                className="h-4 w-4 text-rose-600 focus:ring-rose-500 border-gray-300 rounded"
              />
              <label htmlFor="remember-me" className="ml-2 block text-sm text-gray-900">
                Ingat saya
              </label>
            </div>
            <Link href="#" className="text-sm font-medium text-rose-600 hover:text-rose-500 transition-colors">
              Lupa password?
            </Link>
          </div>

          <button
            type="submit"
            disabled={loading}
            className="w-full py-4 px-6 text-white bg-rose-600 hover:bg-rose-700 disabled:bg-rose-300 rounded-2xl font-bold shadow-lg shadow-rose-200 transition-all active:scale-95 flex items-center justify-center gap-2"
          >
            {loading ? (
              <div className="w-5 h-5 border-2 border-white/30 border-t-white rounded-full animate-spin"></div>
            ) : null}
            Masuk Sekarang
          </button>
        </form>

        <p className="text-center text-sm text-gray-600">
          Belum punya akun?{" "}
          <Link href="/register" className="font-bold text-rose-600 hover:text-rose-500 transition-colors">
            Daftar Gratis
          </Link>
        </p>
      </div>
    </div>
  );
}
