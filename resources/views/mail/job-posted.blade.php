<h2>
    {{ $job->title }}
</h2>

<p>
    Congrates! Your job is now live on your website

</p>

<p>
    <a href="{{ url('/jobs/' . $job->id) }}">View Your Job Listing</a>
</p>
