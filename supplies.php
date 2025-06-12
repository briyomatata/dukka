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

    <main class="container supplier-container">
        <section class="supplier-intro">
            <h1>NEW SUPPLIERS ARE WELCOME!</h1>
            <p>If you value the quality & freshness of your products, you are an honest farmer or butcher - please contact us. We offer you a new, safe & reliable way to sell your products on Mbuzi24.com. Sell to us and get paid the same day! You will reach countless kitchens and tables in Nairobi with us! Together we can improve the quality standards and highlight the importance of healthy, fresh food and taking care of the environment.</p>
            <p class="form-instruction">In order to get in touch with us, fill the questionnaire below.</p>
        </section>

        <form class="supplier-form">
            <div class="form-section">
                <label for="profession">PROFESSION</label>
                <select id="profession" name="profession">
                    <option value="none">None</option>
                    <option value="farmer">Farmer</option>
                    <option value="butcher">Butcher</option>
                    <option value="producer">Producer</option>
                </select>
            </div>

            <div class="form-section">
                <input type="text" id="name" name="name" placeholder="Name">
            </div>

            <div class="form-section">
                <input type="text" id="phone-whatsapp" name="phone_whatsapp" placeholder="Phone/Whatsapp">
            </div>

            <div class="form-section">
                <input type="email" id="email" name="email" placeholder="E-mail">
            </div>

            <div class="form-section products-section">
                <label>PRODUCTS (mark valid checkboxes)</label>
                <div class="checkbox-group">
                    <label class="checkbox-container">Beef
                        <input type="checkbox" name="product[]" value="beef">
                        <span class="checkmark"></span>
                    </label>
                    <label class="checkbox-container">Lamb & Mutton
                        <input type="checkbox" name="product[]" value="lamb_mutton">
                        <span class="checkmark"></span>
                    </label>
                    <label class="checkbox-container">Chicken
                        <input type="checkbox" name="product[]" value="chicken">
                        <span class="checkmark"></span>
                    </label>
                    <label class="checkbox-container">Vegetables
                        <input type="checkbox" name="product[]" value="vegetables">
                        <span class="checkmark"></span>
                    </label>
                    <label class="checkbox-container">Other
                        <input type="checkbox" name="product[]" value="other">
                        <span class="checkmark"></span>
                    </label>
                </div>
            </div>

            <div class="form-section">
                <label for="address">ADDRESS</label>
                <input type="text" id="address" name="address" placeholder="Your farm/butchery address">
            </div>

            <div class="form-section">
                <label for="pricing">PRICING</label>
                <textarea id="pricing" name="pricing" rows="4" placeholder="Write your product prices here"></textarea>
            </div>

            <div class="form-section">
                <label for="free-text">FREE TEXT</label>
                <textarea id="free-text" name="free_text" rows="5" placeholder="Questions, Comments, Other Info please write here"></textarea>
            </div>

            <div class="requirements">
                <h3>REQUIREMENTS FOR SUPPLIERS:</h3>
                <ol>
                    <li>For meat products we require some dry butchered and cut meat.</li>
                    <li>For butchers: The origin of the animal has to be traceable.</li>
                    <li>For farmers: Traceability for meat - the history of the animal.</li>
                    <li>The meat has been treated according to high hygiene standards</li>
                    <li>Having a good transportation infrastructure</li>
                    <li>We expect a trustworthy, humane & ethical approach to animal farming and butchery methods where animal welfare is kept in mind</li>
                    <li>Compliance with green farming standards is beneficial - responsible disposal of organic waste and use of production methods that respect the environment</li>
                </ol>
            </div>

            <div class="form-buttons">
                <button type="submit" class="submit-button">SUBMIT</button>
                <button type="button" class="cancel-button">CANCEL</button>
            </div>
        </form>
    </main>
    
</body>
</html>