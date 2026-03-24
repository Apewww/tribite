"use client";

import { useEffect, useState } from "react";
import { supabase } from "@/lib/supabase";
import { useRouter } from "next/navigation";
import Link from "next/link";

import { AdminSidebar } from "@/components/admin-sidebar";

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
      const { data: profile } = await supabase
        .from("akun")
        .select("role")
        .eq("email", user.email)
        .single();

      if (profile?.role === 1) {
        setIsAdmin(true);
      } else {
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
      <AdminSidebar />

      {/* Main Content */}
      <main className="flex-1 ml-64 p-10">
        {children}
      </main>
    </div>
  );
}
