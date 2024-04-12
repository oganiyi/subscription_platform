<section>
    <h5>Dear {{ ucwords(strtolower($subscriber['user']['name'])) }},</h5>
    <p>
        This is to notify you that a new post has been added to our website:
    </p>

    <p>Title: {{ $post['title'] }}</p>
    <p>
        Description: <br>
        {{ $post['description'] }}
    </p>
    
    <p>
        Regards,<br>
        {{ $post['website']['name'] }}.
    </p>
</section>