@extends('layouts.tracker')

<?php
    use App\Libraries\TrackerLib;
    use Illuminate\Pagination\Paginator
?>

@section('title')
    Issue Tracker
@stop

@section('body')
    <h2>Issue<span> Tracker</span></h2>
    <div id="trackerhead">
        <div class="reportedissuesbtn"><p style="float:left">{{ TrackerLib::getTotalIssues() }} Issues Reported</p></div>
        <div class="resolvedissuesbtn"><p style="float:left">{{ TrackerLib::getTotalIssuesResolved() }} Issues Resolved</p></div>
    </div>
    <div id="trackerbody">
    <table>
        <thead>
            <tr>
                <td style="width:4%">ID</td>
                <td style="width:35%">Title</td>
                <td style="width:15%">Type</td>
                <td style="width:10%">Specific</td>
                <td style="width:4%">Status</td>
                <td style="width:4%">Priority</td>
                <td style="width:11%">Updated</td>
            </tr>
        </thead>

        <tbody>
    @foreach ($issues as $issue)
            <tr>
                <td class="tdalignleft"> #{{ $issue->id }}</td>
                <td class="tdalignleft"> <a href="{{ Config::get('app.url') }}issues/{{ $issue->id }}">{{ $issue->title }}</a></td>
                <td style="text-align:center"> {{ TrackerLib::getCategoryString($issue->category) }}</td>
                <td style="text-align:center"> {{ TrackerLib::getSubCategoryString($issue->subcat) }}</td>
                <td style="text-align:center;color:{{ TrackerLib::getStatusColor($issue->status) }}"> {{ TrackerLib::getStatusString($issue->status) }}</td>
                <td style="text-align:center"> {{ TrackerLib::getPriorityString($issue->priority) }}</td>
                <td class="tdalignright">{{ TrackerLib::getIssueTime($issue->updated) }}</td>
            </tr>

    @endforeach
        </tbody></table><?php echo $issues->links(); ?></div>


@stop