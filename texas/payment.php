<!DOCTYPE html>
<html>
<head>
    <style>
        .container {
            display: flex;
            justify-content: space-between;
            width: 800px;
        }

        .column {
            width: 45%;
            padding: 20px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .form-container {
            background-color: #ffffff;
        }

        .feedback-container {
            background-color: #ffffff;
        }

        .form-input {
            margin-bottom: 10px;
        }

        .submit-button {
            background-color: #4CAF50;
            color: white;
            padding: 10px;
            border: none;
            cursor: pointer;
        }

        .submit-button:hover {
            background-color: #45a049;
        }

        .feedback-input {
            width: 100%;
            height: 100px;
            margin-bottom: 10px;
        }
    </style>
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="..\public\css\admin.css">
</head>
<body>
    <div class="container">
        <div class="column form-container">
            <h2>Payment</h2>
            <form>
                <div class="form-input">
                    <label for="acc-number">Account Number:</label>
                    <input type="text" id="acc-number" name="acc-number">
                </div>
                <div class="form-input">
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name">
                </div>
                <div class="form-input">
                    <label for="bank">Bank:</label>
                    <input type="text" id="bank" name="bank" class="form-control">
                </div>
                <div class="form-input">
                    <label for="price">Price:</label>
                    <input type="text" id="price" name="price">
                </div>
                <div class="form-input">
                    <label for="cvc">CVC:</label>
                    <input type="text" id="cvc" name="cvc">
                </div>
                <button class="submit-button" type="submit">Confirm Order</button>
            </form>
        </div>
        <div class="column feedback-container">
            <h2>Add Your Feedback</h2>
            <form>
                <textarea class="feedback-input" name="feedback" placeholder="Enter your feedback here"></textarea>
                <button class="submit-button" type="submit">Submit</button>
            </form>
        </div>
    </div>
</body>
</html>