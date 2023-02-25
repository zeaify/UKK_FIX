@extends('layouts.app')
@section('content')
    <h1>Input Siswa</h1>

    <form action="/admin/home/store" method="POST" class="form-control">
        @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Name</label>
            <input type="name" class="form-control" id="name" name="name" aria-describedby="emailHelp" placeholder="ex. Johnny Sins">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="your@email.com">
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" aria-describedby="emailHelp" placeholder="yourpassword">
          </div>
        <button type="submit" name="submit" class="btn btn-primary">Save</button>
        <a href="/admin/home" class="btn btn-info">Back</a>
    </form>
@endsection
