<h1>Role Manage page</h1>

{{-- @php
    echo "<pre>";
print_r($role);
echo "</pre>";
@endphp --}}

<table class="table" border="1" style="background-color: bisque">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nmae</th>
        </tr>
    </thead>
  <tbody>
    @foreach ($role as $item )
         <tr>
        <td>{{ $item ['id'] }}</td>
        <td>{{ $item ['name'] }}</td>
    </tr>
    @endforeach
   
  </tbody>

</table> 