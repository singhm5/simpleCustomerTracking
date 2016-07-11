<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Simple Customer Tracking</title>

    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
</head>
<body>

<div id="container">
    <div class="col-xs-12">
        <table id="display-all-table" class="table table-striped">
            <thead>
            <th>ID</th>
            <th>Customer Name</th>
            <th>Company Name</th>
            <th>Title</th>
            <th>Address</th>
            <th>City</th>
            <th></th>
            </thead>
            <tbody>
            <tr></tr>
            </tbody>
        </table>
    </div>
    <div class="row">
        <div class="col-xs-12 col-md-6 col-md-offset-3"">
            <form id="new-contact-form" role="form">
                <div class="form-group">
                    <label for="CompanyName">Company Name:</label>
                    <input type="text" class="form-control" id="CompanyName">
                </div>
                <div class="form-group">
                    <label for="ContactName">Contact Name:</label>
                    <input type="text" class="form-control" id="ContactName">
                </div>
                <div class="form-group">
                    <label for="ContactTitle">Title:</label>
                    <input type="text" class="form-control" id="ContactTitle">
                </div>
                <div class="form-group">
                    <label for="Address">Address:</label>
                    <input type="text" class="form-control" id="Address">
                </div>
                <div class="form-group">
                    <label for="City">City:</label>
                    <input type="text" class="form-control" id="City">
                </div>
                <div class="form-group">
                    <label for="region">Region:</label>
                    <input type="text" class="form-control" id="region">
                </div>
                <div class="form-group">
                    <label for="postal_code">Postal code:</label>
                    <input type="text" class="form-control" id="postal_code">
                </div>
                <div class="form-group">
                    <label for="country">Country:</label>
                    <input type="text" class="form-control" id="Country">
                </div>
                <div class="form-group">
                    <label for="phone">Phone:</label>
                    <input type="text" class="form-control" id="Phone">
                </div>
                <div class="form-group">
                    <label for="fax">fax:</label>
                    <input type="text" class="form-control" id="fax">
                </div>
                <button type="submit" id="new-contact-submit" class="btn btn-default">Submit</button>
            </form>
        </div>
    </div>
</div>
<!-- Modal -->
<div id="editCustomerModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Edit Customer</h4>
            </div>
            <div class="modal-body">
                <form id="edit-contact-form" role="form">
                    <input type="hidden" class="form-control hide customer_id">
                    <div class="form-group">
                        <label for="CompanyName">Company Name:</label>
                        <input type="text" class="form-control CompanyName">
                    </div>
                    <div class="form-group">
                        <label for="ContactName">Contact Name:</label>
                        <input type="text" class="form-control ContactName">
                    </div>
                    <div class="form-group">
                        <label for="ContactTitle">Title:</label>
                        <input type="text" class="form-control ContactTitle">
                    </div>
                    <div class="form-group">
                        <label for="Address">Address:</label>
                        <input type="text" class="form-control Address">
                    </div>
                    <div class="form-group">
                        <label for="City">City:</label>
                        <input type="text" class="form-control City">
                    </div>
                    <div class="form-group">
                        <label for="region">Region:</label>
                        <input type="text" class="form-control region">
                    </div>
                    <div class="form-group">
                        <label for="postal_code">Postal code:</label>
                        <input type="text" class="form-control postal_code">
                    </div>
                    <div class="form-group">
                        <label for="country">Country:</label>
                        <input type="text" class="form-control Country">
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone:</label>
                        <input type="text" class="form-control Phone">
                    </div>
                    <div class="form-group">
                        <label for="fax">fax:</label>
                        <input type="text" class="form-control fax">
                    </div>
                    <button type="submit" id="edit-contact-submit" class="btn btn-default">Update</button>
                    <button type="submit" id="delete-contact" class="btn btn-default">Delete</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>

<script src="https://code.jquery.com/jquery-2.2.4.min.js"
        integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"
        integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS"
        crossorigin="anonymous"></script>
<script src="assets/js/script.js"></script>

</body>
</html>