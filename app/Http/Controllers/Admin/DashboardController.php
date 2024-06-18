<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $userCount = User::all()->count();
        $deletedUserCount = User::onlyTrashed()->count();
        $editedUserCount = User::whereColumn('updated_at', '>', 'created_at')->count();

        // Gráfico 1 - Usuários cadastrados por ano
        $usersData = User::select([
            DB::raw('YEAR(created_at) as ano'),
            DB::raw('COUNT(*) as total')
        ])
            ->groupBy('ano')
            ->orderBy('ano', 'asc')
            ->get();

        //Preparar arrays
        foreach ($usersData as $user) {
            $ano[] = $user->ano;
            $total[] = $user->total;
        }

        //Formartar chartjs
        $userLabel = "'Usuários cadastrados por ano'";
        $userAno = implode(',', $ano);
        $userTotal = implode(',', $total);

        // Gráfico 2 - Usuários deletados por ano
        $deletedUsersData = User::onlyTrashed()
            ->select([
                DB::raw('YEAR(deleted_at) as ano'),
                DB::raw('COUNT(*) as total')
            ])
            ->groupBy('ano')
            ->orderBy('ano', 'asc')
            ->get();

        //Preparar arrays
        foreach ($deletedUsersData as $user) {
            $deletedAno[] = $user->ano;
            $deletedTotal[] = $user->total;
        }

        //Formartar chartjs
        $deletedUserLabel = "'Usuários deletados por ano'";
        $deletedUserAno = implode(',', $deletedAno);
        $deletedUserTotal = implode(',', $deletedTotal);

        //  Gráfico 3 - Usuários editados por ano
        $editedUsersData = User::whereColumn('updated_at', '>', 'created_at')
            ->select([
                DB::raw('YEAR(updated_at) as ano'),
                DB::raw('COUNT(*) as total')
            ])
            ->groupBy('ano')
            ->orderBy('ano', 'asc')
            ->get();

        //Preparar arrays
        foreach ($editedUsersData as $user) {
            $editedAno[] = $user->ano;
            $editedTotal[] = $user->total;
        }

        //Formartar chartjs
        $editedUserLabel = "'Usuários editados por ano'";
        $editedUserAno = implode(',', $editedAno);
        $editedUserTotal = implode(',', $editedTotal);


        return view('dashboard', compact('userCount', 'deletedUserCount', 'editedUserCount', 'userLabel', 'userAno', 'userTotal', 'deletedUserLabel', 'deletedUserAno', 'deletedUserTotal', 'editedUserLabel', 'editedUserAno', 'editedUserTotal'));
    }
}
