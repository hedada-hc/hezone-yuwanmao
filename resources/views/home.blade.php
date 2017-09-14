
                <form action="/" method="post">
                    <input name="_token" type="hidden" value="{{ csrf_token() }}">
                    <input type="text" name="name" placeholder="name">
                    {!! Geetest::render() !!}
                    <input type="submit" value="submit">
                </form>
