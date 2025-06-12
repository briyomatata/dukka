<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
<body>

  <main class="container">
        <section class="contact-info">
            <h1>Contact Information:</h1>
            <div class="info-item">
                <span class="icon">&#9993;</span> <a href="mailto:hello@nyamaonline.com">hello@nyamaonline.com</a>
            </div>
            <div class="info-item">
                <span class="icon">&#9742;</span> <span>0712345678</span>
            </div>
        </section>

        <section class="write-to-us">
            <h2>Write to us:</h2>
            <form class="contact-form">
                <div class="form-group">
                    <input type="text" id="name" name="name" placeholder="Name">
                    <input type="text" id="surname" name="surname" placeholder="Surname">
                </div>
                <div class="form-group">
                    <input type="email" id="email" name="email" placeholder="E-mail">
                    <input type="tel" id="phone" name="phone" placeholder="phone">
                </div>
                <div class="form-group full-width">
                    <textarea id="message" name="message" rows="5" placeholder="Message"></textarea>
                </div>
                <div class="form-group full-width">
                    <textarea id="additional-info" name="additional-info" rows="3" placeholder="Additional info"></textarea>
                </div>
                <div class="form-buttons">
                    <button type="submit" class="submit-button">SUBMIT</button>
                    <button type="button" class="cancel-button">CANCEL</button>
                </div>
            </form>
        </section>
    </main>
    
</body>
</html>