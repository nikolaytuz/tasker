<div class="container-fluid " style="min-height: 100vh;">
  <div class="row">
    <div class="col-6 text-center  mx-auto mt-5" >
      <h1>Задачи</h1>

    </div>
  </div>
  <div class="row">
    <div class="col-7 mx-auto ">

      <div class="w-100 border p-2 d-flex ">
        <h4>Сортировка</h4>
        <a href="?sort=name_us&por=ASC" class="my-auto btn border ml-auto mx-1 px-1">Имя(воз)</a>
        <a href="?sort=name_us&por=DESC" class="my-auto btn border mx-1 px-1">Имя(уб)</a>
        <a href="?sort=email&por=ASC" class="my-auto btn border mx-1 px-1"> почта (воз)</a>
        <a href="?sort=email&por=DESC" class="my-auto btn border mx-1 px-1"> почта (уб)</a>
        <a href="?sort=finish&por=ASC" class="my-auto btn border mx-1 px-1"> статус (воз)</a>
        <a href="?sort=finish&por=DESC" class="my-auto btn border mx-1 px-1"> статус (уб)</a>
      </div>

      <?php if ($data[dat]): ?>

        <?php foreach($data[dat] as $value): ?>
          <div class="card mt-4" >
            <div class="card-body ">
              <?php if ($value[finish] == 'true'): ?>
                <span class=" position-absolute  " style="right:15px;">Выполенено</span>
              <?php endif; ?>

              <?php if ($value[redadmin] == 'true'): ?>
                <small class=" position-absolute  text-danger" style="left:15px; bottom: 30px;">отредактировано администратором</small>
              <?php endif; ?>

              <h5 class="card-title w-100"><span class="card-text">Имя:</span> <?php echo($value[name_us])?>  </h5>
              <h6 class="">Почта: <span class="card-subtitle text-muted"><?php echo($value[email])?> </span></h6>
              <p class="">Задача: <span class="card-text"><?php echo($value[text])?> </span></p>

              <div class="text-right">
                <?php if ($data[isadmin]): ?>
                    <?php if ($value[finish] == 'false'): ?>
                      <a href="/main/succses?id=<?php echo $value[id] ?>" class=" btn btn-dark ">Отметить выполненым</a>
                    <?php endif; ?>
                  <a href="/main/redact?id=<?php echo $value[id] ?>" class=" btn btn-white text-black border ">Редактировать</a>
                <?php endif; ?>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      <?php endif; ?>


      <div class=" mt-5">
          <div class="pagination justify-content-center">
            <?php foreach ($data[dats] as $key => $value): ?>
              <div class="page-item"><a class="page-link" href="/?sort=<?php echo $data[sort] ?>&por=<?php echo $data[por] ?>&page=<? echo $key+1;?>"><? echo $key+1;?></a></div>
            <?php endforeach; ?>

          </div>
      </div>

    </div>
  </div>
</div>
