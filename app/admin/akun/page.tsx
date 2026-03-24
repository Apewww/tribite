"use client";

import { useEffect, useState } from "react";
import { supabase } from "@/lib/supabase";

interface UserAccount {
  id: number;
  nama: string;
  email: string;
  role: number;
  status: string;
}

export default function AdminAkun() {
  const [accounts, setAccounts] = useState<UserAccount[]>([]);
  const [loading, setLoading] = useState(true);

  useEffect(() => {
    async function fetchAccounts() {
      const { data, error } = await supabase
        .from("akun")
        .select("id, nama, email, role, status")
        .neq("status", "deleted");

      if (error) {
        console.error("Error fetching accounts:", error);
      } else {
        setAccounts(data || []);
      }
      setLoading(false);
    }
    fetchAccounts();
  }, []);

  return (
    <div className="space-y-8">
      <div>
        <h1 className="text-3xl font-black tracking-tight">Manajemen Akun</h1>
        <p className="text-gray-400 mt-1">Kelola hak akses dan profil pengguna Tribite.</p>
      </div>

      <div className="bg-gray-800 border border-gray-700 rounded-3xl overflow-hidden shadow-2xl">
        <table className="w-full text-left">
          <thead>
            <tr className="bg-gray-900 border-b border-gray-700">
              <th className="px-6 py-4 text-xs font-black uppercase tracking-widest text-gray-500">Nama</th>
              <th className="px-6 py-4 text-xs font-black uppercase tracking-widest text-gray-500">Email</th>
              <th className="px-6 py-4 text-xs font-black uppercase tracking-widest text-gray-500">Role</th>
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
            ) : accounts.map((account) => (
              <tr key={account.id} className="hover:bg-gray-700/50 transition-colors">
                <td className="px-6 py-4 font-bold text-gray-100 uppercase text-xs tracking-wider">{account.nama}</td>
                <td className="px-6 py-4 font-medium text-gray-400">{account.email}</td>
                <td className="px-6 py-4">
                  <span className={`px-2 py-0.5 rounded-full text-[10px] font-black uppercase tracking-widest border ${
                    account.role === 1 ? "bg-rose-500/10 text-rose-500 border-rose-500/20" : "bg-blue-500/10 text-blue-500 border-blue-500/20"
                  }`}>
                    {account.role === 1 ? "Staff" : "Customer"}
                  </span>
                </td>
                <td className="px-6 py-4 text-right">
                  <button className="text-xs font-black text-gray-500 hover:text-white uppercase tracking-widest">Detail</button>
                </td>
              </tr>
            ))}
          </tbody>
        </table>
      </div>
    </div>
  );
}
