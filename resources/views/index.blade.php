@include('header')

<ul class="reset-repos">
    <li id="reset">Reset Repos</li>
</ul>

<div id="repos">

@foreach ($repos as $repo)
    <section>
        <a href="/repo-details/{{$repo->id}}/" class="repo-link">{{$repo->github_name}}</a>
        <details>
            <summary>Description</summary>
            <p>{{$repo->github_description}}</p>
        </details>
    </section>
@endforeach

</div>

@include('footer')