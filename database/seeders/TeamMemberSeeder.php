<?php

namespace Database\Seeders;

use App\Models\TeamMember;
use Illuminate\Database\Seeder;

class TeamMemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $members = [
            [
                'name' => 'Ryan Prasetya',
                'role' => 'Inisiator & Kurator Lapangan',
                'affiliation' => 'Alumnus Antropologi Terapan & Ekologi Manusia',
                'bio' => "Menghabiskan lebih dari 7 tahun mendampingi komunitas adat di Jawa Tengah, Nusa Tenggara, dan Sulawesi Selatan. Ryan merancang kurikulum pembekalan reflektif sebelum peserta diizinkan menginjakkan kaki di desa binaan.\n\nFokus riset terkini mencakup pelestarian sistem lumbung pangan lokal dan integrasi pembelajaran sains terapan untuk jenjang menengah atas berbasis pengetahuan indigenous.",
                'location' => 'Sekretariat Sleman & Borobudur',
                'email' => 'ryan@destinara.id',
                'phone' => '+62 812-3456-7890',
                'photo' => 'assets/img/hd/team-ryan.jpg',
                'linkedin' => 'https://linkedin.com',
                'instagram' => 'https://instagram.com',
                'order' => 1,
                'is_active' => true,
            ],
            [
                'name' => 'Maya Nirmala',
                'role' => 'Kemitraan Komunitas & Kurikulum',
                'affiliation' => 'Magister Pengembangan Kurikulum & Pedagogi Kritis',
                'bio' => "Berpengalaman menyelaraskan kebutuhan kurikulum sekolah formal nasional dan internasional (IB/Cambridge) dengan realitas sosial pedesaan. Memastikan setiap kunjungan menghasilkan luaran akademik yang terukur tanpa mereduksi martabat warga setempat.\n\nAktif memfasilitasi lokakarya penulisan etnografi sekolah dan penyusunan modul P5 bertema kearifan lokal.",
                'location' => 'Sekretariat Sleman & Yogyakarta Kota',
                'email' => 'maya@destinara.id',
                'phone' => '+62 812-3456-7891',
                'photo' => 'assets/img/hd/team-maya.jpg',
                'linkedin' => 'https://linkedin.com',
                'instagram' => 'https://instagram.com',
                'order' => 2,
                'is_active' => true,
            ],
        ];

        foreach ($members as $member) {
            TeamMember::updateOrCreate(
                ['email' => $member['email']],
                $member
            );
        }
    }
}
