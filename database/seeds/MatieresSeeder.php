<?php

use Illuminate\Database\Seeder;

class MatieresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /* Réseau */
        DB::table('matieres')->insert([
            'intitule' => 'Administration réseau',
            'coefficient' => "1",
            'groupe_matiere_id' => "1",
            'promotion_id' => "1",
            'prof_id' => "6",
            'created_at' => now()
        ]);
        DB::table('matieres')->insert([
            'intitule' => 'Infrastructure et Scripting',
            'coefficient' => "1",
            'groupe_matiere_id' => "1",
            'promotion_id' => "1",
            'prof_id' => "8",
            'created_at' => now()
        ]);
        DB::table('matieres')->insert([
            'intitule' => 'Sécurité',
            'coefficient' => "1",
            'groupe_matiere_id' => "1",
            'promotion_id' => "1",
            'prof_id' => "9",
            'created_at' => now()
        ]);
        DB::table('matieres')->insert([
            'intitule' => 'Système Open Source',
            'coefficient' => "1",
            'groupe_matiere_id' => "1",
            'promotion_id' => "1",
            'prof_id' => "7",
            'created_at' => now()
        ]);
        DB::table('matieres')->insert([
            'intitule' => 'Système Propriétaire',
            'coefficient' => "1",
            'groupe_matiere_id' => "1",
            'promotion_id' => "1",
            'prof_id' => "6",
            'created_at' => now()
        ]);
        DB::table('matieres')->insert([
            'intitule' => 'Déploiement serveur',
            'coefficient' => "1",
            'groupe_matiere_id' => "1",
            'promotion_id' => "1",
            'prof_id' => "2",
            'created_at' => now()
        ]);
        /* Développement */
        DB::table('matieres')->insert([
            'intitule' => 'Conception et modélisation',
            'coefficient' => "1",
            'groupe_matiere_id' => "2",
            'promotion_id' => "1",
            'prof_id' => "1",
            'created_at' => now()
        ]);
        DB::table('matieres')->insert([
            'intitule' => 'JSE',
            'coefficient' => "1",
            'groupe_matiere_id' => "2",
            'promotion_id' => "1",
            'prof_id' => "1",
            'created_at' => now()
        ]);
        DB::table('matieres')->insert([
            'intitule' => 'Technologie Web dynamique',
            'coefficient' => "1",
            'groupe_matiere_id' => "2",
            'promotion_id' => "1",
            'prof_id' => "2",
            'created_at' => now()
        ]);
        DB::table('matieres')->insert([
            'intitule' => 'Application hybride',
            'coefficient' => "1",
            'groupe_matiere_id' => "2",
            'promotion_id' => "1",
            'prof_id' => "1",
            'created_at' => now()
        ]);
        DB::table('matieres')->insert([
            'intitule' => 'JEE',
            'coefficient' => "1",
            'groupe_matiere_id' => "2",
            'promotion_id' => "1",
            'prof_id' => "1",
            'created_at' => now()
        ]);
        DB::table('matieres')->insert([
            'intitule' => 'Arduino',
            'coefficient' => "1",
            'groupe_matiere_id' => "2",
            'promotion_id' => "1",
            'prof_id' => "1",
            'created_at' => now()
        ]);
        /* Divers */
        DB::table('matieres')->insert([
            'intitule' => 'Anglais technique',
            'coefficient' => "1",
            'groupe_matiere_id' => null,
            'promotion_id' => "1",
            'prof_id' => "3",
            'created_at' => now()
        ]);
        DB::table('matieres')->insert([
            'intitule' => 'Base de données',
            'coefficient' => "1",
            'groupe_matiere_id' => null,
            'promotion_id' => "1",
            'prof_id' => "1",
            'created_at' => now()
        ]);
        DB::table('matieres')->insert([
            'intitule' => 'Communication écrite',
            'coefficient' => "1",
            'groupe_matiere_id' => null,
            'promotion_id' => "1",
            'prof_id' => "11",
            'created_at' => now()
        ]);
        DB::table('matieres')->insert([
            'intitule' => 'Gestion de projet',
            'coefficient' => "1",
            'groupe_matiere_id' => null,
            'promotion_id' => "1",
            'prof_id' => "1",
            'created_at' => now()
        ]);
        DB::table('matieres')->insert([
            'intitule' => 'Droit Informatique',
            'coefficient' => "1",
            'groupe_matiere_id' => null,
            'promotion_id' => "1",
            'prof_id' => "1",
            'created_at' => now()
        ]);
        DB::table('matieres')->insert([
            'intitule' => 'Outils mathématiques',
            'coefficient' => "3",
            'groupe_matiere_id' => null,
            'promotion_id' => "1",
            'prof_id' => "2",
            'created_at' => now()
        ]);
        DB::table('matieres')->insert([
            'intitule' => 'Livret de suivi',
            'coefficient' => "1",
            'groupe_matiere_id' => null,
            'promotion_id' => "1",
            'prof_id' => "1",
            'created_at' => now()
        ]);
        DB::table('matieres')->insert([
            'intitule' => 'Suivi de projet',
            'coefficient' => "1",
            'groupe_matiere_id' => null,
            'promotion_id' => "1",
            'prof_id' => "4",
            'created_at' => now()
        ]);
        DB::table('matieres')->insert([
            'intitule' => 'Big data',
            'coefficient' => "1",
            'groupe_matiere_id' => null,
            'promotion_id' => "1",
            'prof_id' => "2",
            'created_at' => now()
        ]);
        /* Management */
        DB::table('matieres')->insert([
            'intitule' => 'Contrôle de gestion',
            'coefficient' => "3",
            'groupe_matiere_id' => "3",
            'promotion_id' => "1",
            'prof_id' => "10",
            'created_at' => now()
        ]);
        DB::table('matieres')->insert([
            'intitule' => 'Management',
            'coefficient' => "1",
            'groupe_matiere_id' => "3",
            'promotion_id' => "1",
            'prof_id' => "10",
            'created_at' => now()
        ]);


         /* Réseau */
         DB::table('matieres')->insert([
            'intitule' => 'Administration réseau',
            'coefficient' => "1",
            'groupe_matiere_id' => "1",
            'promotion_id' => "2",
            'prof_id' => "6",
            'created_at' => now()
        ]);
        DB::table('matieres')->insert([
            'intitule' => 'Infrastructure et Scripting',
            'coefficient' => "1",
            'groupe_matiere_id' => "1",
            'promotion_id' => "2",
            'prof_id' => "8",
            'created_at' => now()
        ]);
        DB::table('matieres')->insert([
            'intitule' => 'Sécurité',
            'coefficient' => "1",
            'groupe_matiere_id' => "1",
            'promotion_id' => "2",
            'prof_id' => "9",
            'created_at' => now()
        ]);
        DB::table('matieres')->insert([
            'intitule' => 'Système Open Source',
            'coefficient' => "1",
            'groupe_matiere_id' => "1",
            'promotion_id' => "2",
            'prof_id' => "7",
            'created_at' => now()
        ]);
        DB::table('matieres')->insert([
            'intitule' => 'Système Propriétaire',
            'coefficient' => "1",
            'groupe_matiere_id' => "1",
            'promotion_id' => "2",
            'prof_id' => "6",
            'created_at' => now()
        ]);
        DB::table('matieres')->insert([
            'intitule' => 'Déploiement serveur',
            'coefficient' => "1",
            'groupe_matiere_id' => "1",
            'promotion_id' => "2",
            'prof_id' => "2",
            'created_at' => now()
        ]);
        /* Développement */
        DB::table('matieres')->insert([
            'intitule' => 'Conception et modélisation',
            'coefficient' => "1",
            'groupe_matiere_id' => "2",
            'promotion_id' => "2",
            'prof_id' => "1",
            'created_at' => now()
        ]);
        DB::table('matieres')->insert([
            'intitule' => 'JSE',
            'coefficient' => "1",
            'groupe_matiere_id' => "2",
            'promotion_id' => "2",
            'prof_id' => "1",
            'created_at' => now()
        ]);
        DB::table('matieres')->insert([
            'intitule' => 'Technologie Web dynamique',
            'coefficient' => "1",
            'groupe_matiere_id' => "2",
            'promotion_id' => "2",
            'prof_id' => "2",
            'created_at' => now()
        ]);
        DB::table('matieres')->insert([
            'intitule' => 'Application hybride',
            'coefficient' => "1",
            'groupe_matiere_id' => "2",
            'promotion_id' => "2",
            'prof_id' => "1",
            'created_at' => now()
        ]);
        DB::table('matieres')->insert([
            'intitule' => 'JEE',
            'coefficient' => "1",
            'groupe_matiere_id' => "2",
            'promotion_id' => "2",
            'prof_id' => "1",
            'created_at' => now()
        ]);
        DB::table('matieres')->insert([
            'intitule' => 'Arduino',
            'coefficient' => "1",
            'groupe_matiere_id' => "2",
            'promotion_id' => "2",
            'prof_id' => "1",
            'created_at' => now()
        ]);
        /* Divers */
        DB::table('matieres')->insert([
            'intitule' => 'Anglais technique',
            'coefficient' => "1",
            'groupe_matiere_id' => null,
            'promotion_id' => "2",
            'prof_id' => "3",
            'created_at' => now()
        ]);
        DB::table('matieres')->insert([
            'intitule' => 'Base de données',
            'coefficient' => "1",
            'groupe_matiere_id' => null,
            'promotion_id' => "2",
            'prof_id' => "1",
            'created_at' => now()
        ]);
        DB::table('matieres')->insert([
            'intitule' => 'Communication écrite',
            'coefficient' => "1",
            'groupe_matiere_id' => null,
            'promotion_id' => "2",
            'prof_id' => "11",
            'created_at' => now()
        ]);
        DB::table('matieres')->insert([
            'intitule' => 'Gestion de projet',
            'coefficient' => "1",
            'groupe_matiere_id' => null,
            'promotion_id' => "2",
            'prof_id' => "1",
            'created_at' => now()
        ]);
        DB::table('matieres')->insert([
            'intitule' => 'Droit Informatique',
            'coefficient' => "1",
            'groupe_matiere_id' => null,
            'promotion_id' => "2",
            'prof_id' => "1",
            'created_at' => now()
        ]);
        DB::table('matieres')->insert([
            'intitule' => 'Outils mathématiques',
            'coefficient' => "3",
            'groupe_matiere_id' => null,
            'promotion_id' => "2",
            'prof_id' => "2",
            'created_at' => now()
        ]);
        DB::table('matieres')->insert([
            'intitule' => 'Livret de suivi',
            'coefficient' => "1",
            'groupe_matiere_id' => null,
            'promotion_id' => "2",
            'prof_id' => "1",
            'created_at' => now()
        ]);
        DB::table('matieres')->insert([
            'intitule' => 'Suivi de projet',
            'coefficient' => "1",
            'groupe_matiere_id' => null,
            'promotion_id' => "2",
            'prof_id' => "4",
            'created_at' => now()
        ]);
        DB::table('matieres')->insert([
            'intitule' => 'Big data',
            'coefficient' => "1",
            'groupe_matiere_id' => null,
            'promotion_id' => "2",
            'prof_id' => "2",
            'created_at' => now()
        ]);
        /* Management */
        DB::table('matieres')->insert([
            'intitule' => 'Contrôle de gestion',
            'coefficient' => "3",
            'groupe_matiere_id' => "3",
            'promotion_id' => "2",
            'prof_id' => "10",
            'created_at' => now()
        ]);
        DB::table('matieres')->insert([
            'intitule' => 'Management',
            'coefficient' => "1",
            'groupe_matiere_id' => "3",
            'promotion_id' => "2",
            'prof_id' => "10",
            'created_at' => now()
        ]);
    }
}
