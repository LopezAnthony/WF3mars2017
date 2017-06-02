  <h1>Users</h1>
  <table class="table">
      <thead>
          <tr>
              <th>ID</th>
              <th>Nom</th>
              <th>Prénom</th>
              <th>Email</th>
              <th>Adresse</th>
          </tr>
      </thead>
      <tbody>
          <?php 
              foreach ($users as $user) :
          ?>
          <tr>
              <td> <?= $user->getId(); ?> </td>
              <td> <?= $user->getLastname(); ?> </td>
              <td> <?= $user->getFirstname(); ?> </td>
              <td> <?= $user->getEmail(); ?> </td>
              <td> <?= $user->getAddress(); ?> </td>
          </tr>
          <?php 
              endforeach;
          ?>
      </tbody>
  </table>
