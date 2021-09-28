<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class RepoController extends Controller
{
    /**
     * Show a list of github repos.
     *
     * @return view with data passed to it
     */
    public function getRepos($returnData = false)
    {
        $repos = DB::table('github_popular_php_repos')->get();

        if($returnData){ return json_encode($repos); }
        else{ return view('index', ['repos' => $repos]); }
    }

    /**
     * Show a detailed view of a given github repo.
     *
     * @return view with data passed to it
     */
    public function getRepoDetails($id)
    {
        $repo = DB::table('github_popular_php_repos')->where('id', '=', (int)$id)->get();

        return view('repo-details', ['repo' => $repo[0]]);
    }

    /**
     * Reset the github repo table with the latest data from github API
     */
    public function resetRepos(Request $request)
    {
        $client = new \GuzzleHttp\Client();
        $response = $client->get('https://api.github.com/search/repositories',
            [
            'query'=>[
                    'q'=>'language:php',
                    'sort'=>'stars',
                    'order'=>'desc',
                    'per_page'=>'100'
                ]
            ]
        );

        if($response->getStatusCode()==200)
        {
            $repos = json_decode($response->getBody());

            RepoController::truncateRepoTable();

            foreach($repos->items as $r){
                RepoController::insertRepo($r->id, $r->name, $r->html_url, $r->created_at, $r->pushed_at, $r->description . '', $r->stargazers_count);
            }
            if($request->query('results')==true)
            {
                echo RepoController::getRepos(true);
            }
            else
            {
                echo 'Records Updated!';
            }
        }
    }

    /**
     * Insert a record into github repo table
     */
    private function insertRepo(int $id, String $name, String $url, String $createdAt, String $pushedAt, String $description, int $starCount)
    {
        DB::table('github_popular_php_repos')->insert([
            'github_id' => $id,
            'github_name' => $name,
            'github_url' => $url,
            'github_created_date' => date('Y-m-d H:i:s', strtotime($createdAt)),
            'github_last_published_date' => date('Y-m-d H:i:s', strtotime($pushedAt)),
            'github_description' => $description,
            'github_star_count' => $starCount
        ]);
    }

    /**
     * Truncate entire github repo table to reset the data
     */
    private function truncateRepoTable()
    {
        DB::table('github_popular_php_repos')->truncate();
    }
}

?>