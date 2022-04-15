@extends('dashboard')
@section('content')
    <main class="login-form">
        <div class="container">
            <div class="col-xs-12 col-sm-8 col-md-push-4">
                <a class="btn btn-primary btn-xs pull-right" href="{{ route('todo.new') }}">Add Todo</a>
            </div>

            <div class="row justify-content-center">
                <div class="col-md-6">
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($lists as $list)
                            <tr>
                                <th scope="row">{{ $loop->index + 1 }}</th>
                                <td @if ($list->status == 2)
                                        ? style="text-decoration: line-through;"
                                        : style="text-decoration: none;"
                                        @endif>
                                    {{ $list->name }}
                                </td>
                                <td>
                                    @if ($list->status == 1)
                                        <a class="change" href="{{ route('todo.change-status', ['id' => $list->id]) }}" title="Change status = Of">
                                            <i class="fa-solid fa-arrows-rotate"></i>
                                        </a>
                                    @else
                                        <form action="{{ route('todo.delete', ['id' => $list->id]) }}" method="POST">
                                            @csrf
                                            {{ method_field('DELETE') }}
                                            <button class="btn small color-delete"
                                                    onclick="return confirm('You definitely want to delete this todo?')">
                                                <i class="fa-solid fa-xmark"></i>
                                            </button>
                                        </form>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
@endsection