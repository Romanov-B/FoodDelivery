## Disclaimer

This is a rather old project made for the sake of proving that pure PHP website with complete control over DB using SQL queries is possible.
Do note, that this approach requires manually writing SQL queries for every type of possible requiest, where most PHP frameworks would usually handle SQL queries by default.


## How to launch

1. Intall files into Apache folder (Make sure you have Apache server installed beforehand).
2. Import database files ("Database4.accdb") to MySQL (This contains DB schema)
3. Launch the Apache server


## How to use 

The main page looks like this (Figure 1):

<img width="647" height="304" alt="image" src="https://github.com/user-attachments/assets/cdfed92d-d28a-4e91-acdc-3fd100a4fabe" />
Figure 1 – Main page view


### For Regular Customer

To view the catalog of available products, select “Product Catalog” in the side menu bar. After that, a table describing all available products should be displayed on the screen (Figure 2).

<img width="646" height="207" alt="image" src="https://github.com/user-attachments/assets/568e973d-0754-4d9a-8ba7-ef2ef4083749" />
Figure 2 – Product Catalog View

For the client to independently form an order, the options “Order” and “Products on order” are provided. To create an order, you must click on the “Order” button in the side menu and enter your contact details (Figure 3).

<img width="610" height="495" alt="image" src="https://github.com/user-attachments/assets/e5fbaa78-3aec-423a-a313-4cf4f3513e11" />
Figure 3 – Contact details form view

After clicking on the “Send” button, the fields will be replaced with product parameters (Figure 4).

<img width="647" height="334" alt="image" src="https://github.com/user-attachments/assets/a174ce79-0a0e-4b86-b273-27b9dd349012" />
Figure 4 – View of the form for adding a product to an order

After entering the product data and clicking the “Send” button, the product is added to the order. The products included in your order can be viewed by clicking the “Products in the order” button on the side menu bar (Figure 5)

<img width="647" height="273" alt="image" src="https://github.com/user-attachments/assets/7bad4b13-c8e0-4145-8012-1bf57800bf97" />
Figure 5 – View of the list of products in the order

After adding all products to the order, you can click the “Finish order creation” button on the product data form. After that, the order remains saved in the server database and can be viewed by employees.


### For Employee

To access the employee functionality, you must click the “For employees” button, which is located on the navigation bar at the top of the page. If the user is not authorized in the system, he must enter his login and password (Figure 6)

<img width="647" height="369" alt="image" src="https://github.com/user-attachments/assets/095db51d-d499-4aa4-88f9-a221e7b42125" />
Figure 6 – Form for authorization by entering login and password

In case of an authorization error, an error message will be displayed (Figure 7)

<img width="647" height="362" alt="image" src="https://github.com/user-attachments/assets/419a4533-ab7f-4e3c-94fb-00af8f4eac3e" />
Figure 7 – Error message during authorization

In case of successful authorization, the user will be granted access to work with tables. The screen will display a drop-down menu for selecting the table to work with (Figure 8)

<img width="647" height="583" alt="image" src="https://github.com/user-attachments/assets/0101aeea-410a-46d6-9627-5fef987a1141" />
Figure 8 – Drop-down menu for selecting a table

To start working with a table, select the required table in the drop-down menu and click the “Select” button. After that, the corresponding table will be displayed on the screen, the “Add record” button above the table and the “Edit” button opposite each table row (Figure 9).

<img width="646" height="287" alt="image" src="https://github.com/user-attachments/assets/7b548d4b-1a8c-4395-b4a8-a736789e0617" />
Figure 9 – Table interface

To add a new record, click the “Add record” button. After that, the fields for the corresponding table data will be displayed on the screen (Figure 10).

<img width="647" height="322" alt="image" src="https://github.com/user-attachments/assets/8806d1f5-3ca9-40d2-8496-0dac836897cc" />
Figure 10 – Fields for adding a new record to the table

After entering the necessary data in the fields and clicking the “Create record” button, a new row will be added to the table containing the corresponding data.
To edit an existing record, click the “Edit” button opposite the corresponding record in the table. After clicking the “Edit” button, a form with fields corresponding to all columns of the table will be displayed on the screen. When editing, the displayed fields will be filled with data from the edited record (Figure 11)

<img width="646" height="321" alt="image" src="https://github.com/user-attachments/assets/6bc6d1e2-26f4-4ee8-a95e-a821bbf353f0" />
Figure 11 – Appearance of the form for editing the table

After clicking the “Confirm changes” button, the corresponding changes will be displayed in the table. A message about the record change will be displayed (Figure 3.31)

<img width="646" height="291" alt="image" src="https://github.com/user-attachments/assets/4aa9b1ec-6dfc-4a33-a4f4-3ae2d949f771" />
Figure 3.31 – View of the table interface with a message about editing the table

Editing any other tables is done in a similar way.
