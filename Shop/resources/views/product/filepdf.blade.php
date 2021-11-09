
<style>
    .btn-filter{
        margin: 10px;
    }
</style>
<table class="table table-striped">

    <tr>
        <td> ID</td>
        <td> Title</td>
        <td> Price</td>
        <td> {{_('Image')}}</td>
        <td> Category </td>
    </tr>

    {{-- @foreach ($products as $product)
        <tr>
            <td> {{$product->id}} </td>
            <td> {{$product->title}} </td>
            <td> {{$product->price}} </td>
            <td> {{$product->image}} </td>
            <td> {{$product->categoryID->title}} </td>
        </tr>
    @endforeach --}}
</table>


