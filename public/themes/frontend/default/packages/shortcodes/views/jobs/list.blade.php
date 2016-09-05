<div class="col-xs-12 career_table">
    <div class="careerTable">
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Stellenbezeichnung</th>
                <th>Standort</th>
                <th>Unternehmensbereich</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($jobs as $job)
            <tr data-href="{{ route('jobs.show', $job->id) }}" class="toDetail">
                <td>{{ $job->title }}</td>
                <td>{{ $job->station->city }}</td>
                <td>{{ $job->category->title }}<i aria-hidden="true" class="fa fa-angle-right"></i></td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>