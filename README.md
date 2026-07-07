***Disclaimer***
This is a rather old project made for the sake of proving that pure PHP website is possible.

***How to launch***
1. Intall files into Apache folder (Make sure you have Apache server installed beforehand).
2. Import database files ("Database4.accdb") to MySQL (This contains DB schema)
3. Launch the Apache server

***How to use***
The main page looks like this (Figure 1):
<img width="647" height="304" alt="image" src="https://github.com/user-attachments/assets/cdfed92d-d28a-4e91-acdc-3fd100a4fabe" />

Figure 1 – Main page view

3.4.2.1 Instructions for a regular customer

To view the catalog of available products, select “Product Catalog” in the side menu bar. After that, a table describing all available products should be displayed on the screen (Figure 3.2).

Figure 3.21 – Product Catalog View

For the client to independently form an order, the options “Order” and “Products on order” are provided. To create an order, you must click on the “Order” button in the side menu and enter your contact details (Figure 3.22).

Figure 3.22 – Contact details form view

After clicking on the “Send” button, the fields will be replaced with product parameters (Figure 3.23).

Figure 3.23 – View of the form for adding a product to an order

After entering the product data and clicking the “Send” button, the product is added to the order. The products included in your order can be viewed by clicking the “Products in the order” button on the side menu bar (Figure 3.24)

Figure 3.24 – View of the list of products in the order

After adding all products to the order, you can click the “Finish order creation” button on the product data form. After that, the order remains saved in the server database and can be viewed by employees.

3.4.2.2 Instructions for employees

To access the employee functionality, you must click the “For employees” button, which is located on the navigation bar at the top of the page. If the user is not authorized in the system, he must enter his login and password (Figure 3.25)

Figure 3.25 – Form for authorization by entering login and password

In case of an authorization error, an error message will be displayed (Figure 3.26)

Figure 3.26 – Error message during authorization

In case of successful authorization, the user will be granted access to work with tables. The screen will display a drop-down menu for selecting the table to work with (Figure 3.27)

Figure 3.27 – Drop-down menu for selecting a table

To start working with a table, select the required table in the drop-down menu and click the “Select” button. After that, the corresponding table will be displayed on the screen, the “Add record” button above the table and the “Edit” button opposite each table row (Figure 3.28).

Figure 3.28 – Table interface

To add a new record, click the “Add record” button. After that, the fields for the corresponding table data will be displayed on the screen (Figure 3.29).

Figure 3.29 – Fields for adding a new record to the table

After entering the necessary data in the fields and clicking the “Create record” button, a new row will be added to the table containing the corresponding data.
To edit an existing record, click the “Edit” button opposite the corresponding record in the table. After clicking the “Edit” button, a form with fields corresponding to all columns of the table will be displayed on the screen. When editing, the displayed fields will be filled with data from the edited record (Figure 3.30)

Figure 3.30 – Appearance of the form for editing the table

After clicking the “Confirm changes” button, the corresponding changes will be displayed in the table. A message about the record change will be displayed (Figure 3.31)

Figure 3.31 – View of the table interface with a message about editing the table

Editing any other tables is done in a similar way.
