# Random Number WP

**Random Number WP** is a WordPress plugin that allows you to assign random numbers to a list of names and display them in a sorted list. It’s perfect for games, contests, or team assignments!

---

## **Features**
- **Random Number Assignment**: Assigns a unique random number (between 1 and 100) to each name.
- **Sorted List**: Displays the names and their numbers in ascending order.
- **User-Friendly Interface**: Clean and intuitive design.
- **Translation-Ready**: Supports multiple languages using WordPress’s translation system.

---

## **Installation**

1. **Download the Plugin**:
   - Download the plugin files from the [GitHub repository](https://github.com/duesseldorp/random-number-wp).

2. **Upload to WordPress**:
   - Go to **Plugins > Add New > Upload Plugin** in your WordPress admin dashboard.
   - Upload the `random-number-wp.zip` file and click **Install Now**.

3. **Activate the Plugin**:
   - After installation, click **Activate Plugin**.

---

## **Usage**

1. **Add the Tool to a Page or Post**:
   - Use the shortcode `[random_number_wp]` in any post or page where you want the tool to appear.

2. **Enter Names**:
   - Input a list of names, separated by commas, into the text box.

3. **Generate Random Numbers**:
   - Click the "Start" button, and the tool will assign a random number to each name, displaying them one by one with a 1-second delay.

4. **View Sorted List**:
   - After all names are displayed, the tool will show a sorted list of names and their numbers in ascending order.

---

## **Customization**

### **Change the Range of Random Numbers**
- In `script.js`, modify the `getSecureRandomNumber(1, 100)` function to change the range of random numbers.
- Example: Use `getSecureRandomNumber(50, 200)` for numbers between 50 and 200.

---

### **Update Styling**
- Edit the `style.css` file to customize the appearance of the tool.
- Example: Change the background color, font, or button style.

---

## **Security**

- **Input Sanitization**: The plugin uses the `escapeHtml()` function to sanitize user input and prevent XSS attacks.
- **Secure Randomness**: The plugin uses `crypto.getRandomValues()` for cryptographically secure random numbers.

---

## **License**

This project is open-source and available under the [MIT License](LICENSE). Feel free to use, modify, and distribute it as needed.

---

## **Author**

[Martin Gräbing}
[kontakt@duesseldorp.de]  
[https://www.github.com/duesseldorp]

---

Enjoy using **Random Number WP**! 😊
