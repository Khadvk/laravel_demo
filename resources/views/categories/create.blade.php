<x-layout>
    <x-setting heading="Publish New Post">
        <form method="post" action="/categories">
            {{ csrf_field() }}
            <div class="form-group row">
                <label for="nameid" class="col-sm-3 col-form-label">Category's name</label>
                <div class="col-sm-9">
                    <input name="name" type="text" class="form-control" id="nameid" placeholder="Category's name">
                </div>
            </div>
            <div class="form-group row">
                <label for="descriptionid" class="col-sm-3 col-form-label">Description</label>
                <div class="col-sm-9">
                    <input name="description" type="text" class="form-control" id="descriptionid"
                        placeholder="Category's description">
                </div>
            </div>
            <div class="form-group row">
                <div class="offset-sm-3 col-sm-9">
                    <button type="submit" class="btn btn-primary">Submit Category</button>
                </div>
            </div>
    </form>
    </x-setting>
</x-layout>
