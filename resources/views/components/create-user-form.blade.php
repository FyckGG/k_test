<ul id="createUserErrors" class="list-group">
</ul>
<form id="createUserForm" class="border border-secondary rounded p-2 mt-4">
  @csrf
    <div class="form-group">
      <label for="userName">User name</label>
      <input type="text" class="form-control" id="userName" name="userName" placeholder="Enter user name" required>
      <label for="userEmail" class="mt-2">User email</label>
      <input type="email" class="form-control" id="userEmail" name="userEmail" placeholder="Enter user email" required>
      <label for="userPhone" class="mt-2">User phone number</label>
      <input type="tel" class="form-control" id="userPhone" name="userPhone" placeholder="Enter user phone number" 
      pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" required>
      <small>Format: 012-345-6789</small>
    </div>
    <div class="mt-2">
      <button type="submit" class="btn btn-primary btn-submit">Create user</button>
    </div>
  </form>

 <script>
  $.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});

  $('#createUserForm').on('submit', function(e) {
    e.preventDefault();

    const errorsList = document.getElementById('createUserErrors');
    errorsList.innerHTML = '';

    const formData = new FormData(this);

    const name = $("input[name=userName]").val();
    const email = $("input[name=userEmail]").val();
    const phone = $("input[name=userPhone]").val();

    $.ajax({
      type: 'POST',
      url: "{{route('users.store')}}",
      data: formData,
      processData: false,
      contentType: false,
      success:function(data) {
        alert(data.message);
        window.location.replace("{{route('main')}}");
      },
      error:function(data) {
        
        let errors = '';

        if (data.responseJSON.errors !== undefined && Object.keys(data.responseJSON.errors).length > 0)
        {
          for (const [key, value] of Object.entries(data.responseJSON.errors)) {

          errors += `<li class='list-group-item list-group-item-danger'>${value}</li>`;
          }
        }
        else if (data.responseJSON.message !== undefined) 
        errors += `<li class='list-group-item list-group-item-danger'>${data.responseJSON.message}</li>`;
        else errors += `<li class='list-group-item list-group-item-danger'>Internal server error. Please, try again.</li>`;

        errorsList.innerHTML = errors;
      }

    })
  })

 </script>