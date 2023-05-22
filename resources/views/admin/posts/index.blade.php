@extends('layouts.app')

@section('content')

<table class="table">
    <thead>
      <tr>
        <th scope="col">id</th>
        <th scope="col">Titolo</th>
        <th scope="col">Slug</th>
        <th scope="col">Azioni</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($projects as $project)
            <tr>
                <td>{{$project->id}}</td>
                <td>{{$project->title}}</td>
                <td>{{$project->slug}}</td>
                <td class="d-flex">
                  <a class="btn btn-primary me-3" href="{{route('admin.crudprojects.show', ['project' => $project->slug])}}">Dettagli</a>
                  <a class="btn btn-secondary me-3" href="{{route('admin.crudprojects.edit', ['project' => $project->slug])}}">Modifica</a>
                  <form action="{{route('admin.crudprojects.destroy', ['project' => $project->slug])}}" method="POST">
                      @csrf
                      @method('DELETE')
                      <!--onclick="return confirm('Are you sure?')"-->
                      <button type="submit" class="btn btn-danger delete">Elimina</button>
                  </form>
              </td>
            </tr>
        @endforeach
    </tbody>
  </table>

@endsection