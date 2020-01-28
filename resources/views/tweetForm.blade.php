
<form action="/" method="post">
    @csrf
    <input type="text" name="author" value='author'>
    <input type="text" name="content" value='tweet'>
    <input type="submit" name="submit" value="Create Tweet">
</form>
