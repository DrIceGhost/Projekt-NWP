<?php
  print '
  <h1>Contact Form</h1>
  <div id="contact">
  
    <form action="process_contact.php" id="contact_form" name="contact_form" method="POST"> <label for="fname">First Name *</label>
      <input type="text" id="fname" name="firstname" placeholder="Your name.." required>

      <label for="lname">Last Name *</label>
      <input type="text" id="lname" name="lastname" placeholder="Your last name.." required>

      <label for="lname">Your E-mail *</label>
      <input type="email" id="email" name="email" placeholder="Your e-mail.." required>

      <label for="country">Country</label>
      <select id="country" name="country">
        <option value="">Please select</option>
        <option value="HR" selected>Croatia</option>
        <option value="DE">Slovenia</option>
        <option value="SL">Austria</option>
        <option value="HU">Hugary</option>
        <option value="HU">Italy</option>
        <option value="HU">Bosnia & Hercegovina</option>
        <option value="HU">Serbia</option>
        <option value="HU">Montenegro</option>
      </select>

      <label for="subject">Subject</label>
      <textarea id="subject" name="subject" placeholder="Write something.." style="height:120px"></textarea>

      <input type="submit" value="Submit"> <br><br>

  <div style="width: 100%; margin: 0 auto; display: flex; justify-content: center;"><iframe width="80%" height="600" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2771.7271989832266!2d15.88998777680569!3d45.99667587108767!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4765c3d9330de1f7%3A0xe214112830a7e03a!2sMK%20Zagorski%20Orlovi%20Club%20House!5e0!3m2!1shr!2shr!4v1725008028017!5m2!1shr!2shr" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

    </form>
  </div>';
?>