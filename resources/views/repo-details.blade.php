@include('header')

<ul class="breadcrumb">
  <li><a href="/">Home</a></li>
  <li>Repo Details</li>
</ul>

<section>
    <p>
        <b>Github ID:</b><br />
        {{ $repo->github_id }}
    </p>
    <p>
        <b>Name:</b><br />
        {{ $repo->github_name }}
    </p>
    <p>
        <b>Creation Date:</b><br />
        <?php
            echo date('D., F jS, Y \a\t g:ia', strtotime($repo->github_created_date))
        ?>
    </p>
    <p>
        <b>Last Published Date:</b><br />
        <?php
            echo date('D., F jS, Y \a\t g:ia', strtotime($repo->github_last_published_date))
        ?>
    </p>
    <p>
        <b>Description:</b><br />
        {{ $repo->github_description }}
    </p>
    <p>
        <b>Star Count:</b><br />
        <?php echo number_format($repo->github_star_count); ?>
    </p>
    <p>
        <b>Github URL:</b><br />
        <a href="{{ $repo->github_url }}" target="_blank">{{ $repo->github_url }}</a>
    </p>
</section>

@include('footer')