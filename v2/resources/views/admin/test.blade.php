<form action="{{ route('admin.test.post') }}" method="POST">
    @csrf
    <button type="submit">Submit POST</button>
</form>
