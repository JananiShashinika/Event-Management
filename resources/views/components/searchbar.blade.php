
    {{--<form action="{{url('search')}}" method="get" role="search" class="searchbar">
        <div class="input-group form-content">
            <input type="search" name="search" class="form-control" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
            <button type="button" class="btn btn-outline-primary">search</button>
        </div>
    </form>--}}

    <div class="input-group">
        <select class="form-select w-25">
            <option selected>Select Field</option>
            <option value="1">Event ID</option>
            <option value="2">Event Type</option>
        </select>
        <input type="search" class="form-control w-50" placeholder="Search">
        <button class="btn btn-primary" type="button">Search</button>
    </div>



