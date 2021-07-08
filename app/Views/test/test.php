<?= $this->extend('templates/main') ?>
<?= $this->section('content') ?>

  <?php       
      foreach($jobs as $job) 
      {
         print 'JOB: '. $job->job. ', SALARY: '. $job->salary.'<br>';
      }  

      foreach($traits as $key => $t) 
      {
         print 'Index: '. $key. ', Value: '. $t.'<br>';
      }  

      get_print_r($row);
      print '<br>'. $skill. '<br>';
      get_print_r($sp);
      

    ?>

      <!-- <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <?= form_open(current_url(TRUE)) ?>
              <h1 class="text-center">Iniciar Sesión</h1>		  
              <div>
				<span><strong>Email</strong></span>
                <input type="email" class="form-control" name="email" value="<?= set_value('email') ?>" placeholder="Email" required />
              </div><br>
              <div>
				<span><strong>Contraseña</strong></span>
                <input type="password" class="form-control" name="password" value="<?= set_value('password') ?>" placeholder="Password" required />
              </div><br>
              <div>
                <button type="submit" class="btn btn-block btn-warning submit">Abrir Sesión</button>                
              </div>
           <?= form_close() ?>
          </section>
        </div>
      </div> -->

<?= $this->endSection() ?>