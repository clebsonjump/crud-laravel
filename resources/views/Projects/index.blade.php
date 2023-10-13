@extends('layouts.app')


@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <hr>
        </div>

    </div>
</div>

@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif

<table class="table table-bordered table-responsive-lg">
    <tr>
        <th>Id</th>
        <th>Nome</th>
        <th>Introdução</th>
        <th>Localização</th>
        <th>Cost</th>
        <th>Date Created</th>
        <th colspan="3" align="center">Action</th>
    </tr>
    @foreach ($projects as $project)
    <tr>
        <td>{{ ++$i }}</td>
        <td>{{ $project->name }}</td>
        <td>{{ $project->introduction }}</td>
        <td>{{ $project->location }}</td>
        <td>{{ $project->cost }}</td>
        <td>{{ date_format($project->created_at, 'jS M Y') }}</td>
        <td align="center">
            <form action="{{ route('projects.destroy', $project->id) }}" method="POST">

                <a href="{{ route('projects.show', $project->id) }}" title="show">
                    <i class="fa fa-eye text-success  fa-lg"></i>
                </a>
        </td>
        <td align="center">
            <a href="{{ route('projects.edit', $project->id) }}">
                <i class="fas fa-edit  fa-lg"></i>

            </a>
        </td>

        @csrf
        @method('DELETE')
        <td align="center">
            <button type="submit" title="delete" style="border: none; background-color:transparent;">
                <i class="fas fa-trash fa-lg text-danger"></i>
        </td>
        </button>
        </form>
        </td>
    </tr>
    @endforeach
</table>

<div class="pull-right">
    <a class="btn btn-primary"  href="{{ route('projects.create') }}" title="Create a project"> <i class="fas fa-plus-circle"></i>
    </a>
</div>

{!! $projects->links() !!}

@endsection