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

        //Gráfico 4 - Usuários deletados por mês
        $deletedUsersData = User::onlyTrashed()
            ->select([
                DB::raw('MONTH(deleted_at) as mes'),
                DB::raw('COUNT(*) as total')
            ])
            ->groupBy('mes')
            ->orderBy('mes', 'asc')
            ->get();

        // array de meses
        $months = [
            1 => 'Janeiro', 2 => 'Fevereiro', 3 => 'Março', 4 => 'Abril', 5 => 'Maio',
            6 => 'Junho', 7 => 'Julho', 8 => 'Agosto', 9 => 'Setembro', 10 => 'Outubro',
            11 => 'Novembro', 12 => 'Dezembro'
        ];

        //Preparar arrays
        foreach ($deletedUsersData as $user) {
            $deletedMes[] = $months[$user->mes];
            $deletedTotal[] = $user->total;
        }



        //Formartar chartjs
        $deletedUserLabelMes = "'Usuários deletados por mês'";
        $deletedUserMes = "'" . implode("','", $deletedMes) . "'";
        $deletedUserTotalMes = implode(',', $deletedTotal);




        return view('dashboard', compact('userCount', 'deletedUserCount', 'editedUserCount', 'userLabel', 'userAno', 'userTotal', 'deletedUserLabel', 'deletedUserAno', 'deletedUserTotal', 'editedUserLabel', 'editedUserAno', 'editedUserTotal', 'deletedUserLabelMes', 'deletedUserMes', 'deletedUserTotalMes'));
    }
}