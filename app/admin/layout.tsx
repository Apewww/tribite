"use client";

import { useEffect, useState } from "react";
import { supabase } from "@/lib/supabase";
import { useRouter } from "next/navigation";
import Link from "next/link";

export default function AdminLayout({
  children,
}: {
  children: React.ReactNode;
}) {
  const [isAdmin, setIsAdmin] = useState(false);
  const [loading, setLoading] = useState(true);
  const router = useRouter();

  useEffect(() => {
    async function checkAdmin() {
      const { data: { user } } = await supabase.auth.getUser();
      if (!user) {
        router.push("/login");
        return;
      }

      // Check user role from 'akun' table
      // In Supabase, we might use user_metadata or a separate table.
      // Based on the SQL schema, 'role' is in 'akun'.
      const { data: profile } = await supabase
        .from("akun")
        .select("role")
        .eq("email", user.email)
        .single();

      if (profile?.role === 1) {
        setIsAdmin(true);
      } else {
        // Not a staff member
        router.push("/dashboard");
      }
      setLoading(false);
    }
    checkAdmin();
  }, [router]);

  if (loading) return (
    <div className="min-h-screen flex items-center justify-center bg-gray-900">
      <div className="w-10 h-10 border-4 border-gray-800 border-t-rose-600 rounded-full animate-spin"></div>
    </div>
  );

  if (!isAdmin) return null;

  return (
    <div className="min-h-screen bg-gray-900 text-white flex">
      {/* Sidebar */}
      <aside className="w-64 bg-gray-950 border-r border-gray-800 p-6 flex flex-col fixed h-full">
        <div className="flex items-center gap-2 mb-10">
          <div className="w-8 h-8 bg-rose-600 rounded-lg flex items-center justify-center font-bold">T</div>
          <span className="font-bold tracking-widest text-sm uppercase">Tribite Admin</span>
        </div>
        <nav className="flex-1 space-y-2">
          <Link href="/admin" className="flex items-center gap-3 px-4 py-3 bg-gray-900 rounded-xl text-sm font-bold border border-gray-800 hover:border-rose-600 transition-all group">
            <span className="group-hover:scale-110 transition-transform">📊</span> Dashboard
          </Link>
          <Link href="/admin/katalog" className="flex items-center gap-3 px-4 py-3 hover:bg-gray-900 rounded-xl text-sm font-bold border border-transparent hover:border-gray-800 transition-all group">
            <span className="group-hover:scale-110 transition-transform">🍔</span> Katalog Menu
          </Link>
          <Link href="/admin/akun" className="flex items-center gap-3 px-4 py-3 hover:bg-gray-900 rounded-xl text-sm font-bold border border-transparent hover:border-gray-800 transition-all group">
            <span className="group-hover:scale-110 transition-transform">👥</span> Manajemen Akun
          </Link>
          <Link href="/admin/kupon" className="flex items-center gap-3 px-4 py-3 hover:bg-gray-900 rounded-xl text-sm font-bold border border-transparent hover:border-gray-800 transition-all group">
            <span className="group-hover:scale-110 transition-transform">🎟️</span> Kupon Diskon
          </Link>
        </nav>
        <Link href="/" className="mt-auto px-4 py-3 text-xs font-bold text-gray-500 hover:text-rose-600 transition-colors uppercase tracking-widest">
           ← Ke Website
        </Link>
      </aside>

      {/* Main Content */}
      <main className="flex-1 ml-64 p-10">
        {children}
      </main>
    </div>
  );
}
