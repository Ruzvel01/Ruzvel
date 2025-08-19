        <?php
    include("../main/main.php")
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fleet Maintenance Management</title>
        <link rel="stylesheet" href="../main/style.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        /* Custom Styles */
        .maintenance-card {
            border-left: 4px solid #0d6efd;
        }
        .status-badge {
            font-size: 0.75rem;
            padding: 0.3rem 0.6rem;
        }
        .table-responsive {
            overflow-x: auto;
        }
        .modal-lg-custom {
            max-width: 800px;
        }
        .detail-row {
            margin-bottom: 1rem;
        }
        .detail-label {
            font-weight: 600;
            color: #495057;
        }
    </style>
</head>
<body>
      
    <?php
    include("../includes/sidebar.php")
    ?>

  
      

    <div class="container-fluid py-4">
        <!-- Maintenance Module Header -->
        <div class="row mb-4">
            <div class="col-12">
                <div class="card maintenance-card shadow-sm">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <h4 class="card-title mb-0"><i class="fas fa-tools me-2"></i>Fleet Maintenance Management</h4>
                            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addMaintenanceModal">
                                <i class="fas fa-plus me-1"></i> Add New Maintenance
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Maintenance Records Table -->
        <div class="row">
            <div class="col-12">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover" id="maintenanceTable">
                                <thead class="table-light">
                                    <tr>
                                        <th>ID</th>
                                        <th>Vehicle</th>
                                        <th>Type</th>
                                        <th>Date</th>
                                        <th>Mileage</th>
                                        <th>Cost</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>MTN-001</td>
                                        <td>Truck A12345</td>
                                        <td>Preventive</td>
                                        <td>2023-05-15</td>
                                        <td>85,000 km</td>
                                        <td>$350.00</td>
                                        <td><span class="badge bg-success status-badge">Completed</span></td>
                                        <td>
                                            <button class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#viewMaintenanceModal">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                            <button class="btn btn-sm btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#editMaintenanceModal">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <button class="btn btn-sm btn-outline-danger" data-bs-toggle="modal" data-bs-target="#deleteMaintenanceModal">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>MTN-002</td>
                                        <td>Van B67890</td>
                                        <td>Corrective</td>
                                        <td>2023-06-02</td>
                                        <td>42,500 km</td>
                                        <td>$175.50</td>
                                        <td><span class="badge bg-warning status-badge">In Progress</span></td>
                                        <td>
                                            <button class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#viewMaintenanceModal">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                            <button class="btn btn-sm btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#editMaintenanceModal">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <button class="btn btn-sm btn-outline-danger" data-bs-toggle="modal" data-bs-target="#deleteMaintenanceModal">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>MTN-003</td>
                                        <td>Truck C45678</td>
                                        <td>Inspection</td>
                                        <td>2023-06-10</td>
                                        <td>120,750 km</td>
                                        <td>$90.00</td>
                                        <td><span class="badge bg-info status-badge">Scheduled</span></td>
                                        <td>
                                            <button class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#viewMaintenanceModal">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                            <button class="btn btn-sm btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#editMaintenanceModal">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <button class="btn btn-sm btn-outline-danger" data-bs-toggle="modal" data-bs-target="#deleteMaintenanceModal">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>MTN-004</td>
                                        <td>Truck D90123</td>
                                        <td>Emergency</td>
                                        <td>2023-06-15</td>
                                        <td>95,200 km</td>
                                        <td>$620.00</td>
                                        <td><span class="badge bg-danger status-badge">Overdue</span></td>
                                        <td>
                                            <button class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#viewMaintenanceModal">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                            <button class="btn btn-sm btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#editMaintenanceModal">
                                                <i class="fas fa-edit"></i>
                                            </button>
                                            <button class="btn btn-sm btn-outline-danger" data-bs-toggle="modal" data-bs-target="#deleteMaintenanceModal">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Maintenance Modal -->
    <div class="modal fade" id="addMaintenanceModal" tabindex="-1" aria-labelledby="addMaintenanceModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-lg-custom">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="addMaintenanceModalLabel"><i class="fas fa-plus-circle me-2"></i>Add New Maintenance Record</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="addMaintenanceForm">
                        <div class="row mb-3">
                            <div class="col-md-6 mb-3">
                                <label for="vehicleSelect" class="form-label">Vehicle</label>
                                <select class="form-select" id="vehicleSelect" required>
                                    <option value="" selected disabled>Select Vehicle</option>
                                    <option value="Truck A12345">Truck A12345</option>
                                    <option value="Van B67890">Van B67890</option>
                                    <option value="Truck C45678">Truck C45678</option>
                                    <option value="Truck D90123">Truck D90123</option>
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="maintenanceType" class="form-label">Maintenance Type</label>
                                <select class="form-select" id="maintenanceType" required>
                                    <option value="" selected disabled>Select Type</option>
                                    <option value="Preventive">Preventive</option>
                                    <option value="Corrective">Corrective</option>
                                    <option value="Inspection">Inspection</option>
                                    <option value="Emergency">Emergency</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6 mb-3">
                                <label for="maintenanceDate" class="form-label">Date</label>
                                <input type="date" class="form-control" id="maintenanceDate" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="mileage" class="form-label">Mileage (km)</label>
                                <input type="number" class="form-control" id="mileage" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6 mb-3">
                                <label for="cost" class="form-label">Cost ($)</label>
                                <input type="number" step="0.01" class="form-control" id="cost" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="status" class="form-label">Status</label>
                                <select class="form-select" id="status" required>
                                    <option value="" selected disabled>Select Status</option>
                                    <option value="Scheduled">Scheduled</option>
                                    <option value="In Progress">In Progress</option>
                                    <option value="Completed">Completed</option>
                                    <option value="Overdue">Overdue</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" id="description" rows="3"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="partsReplaced" class="form-label">Parts Replaced</label>
                            <textarea class="form-control" id="partsReplaced" rows="3" placeholder="List parts replaced, separated by commas"></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-primary" id="saveMaintenanceBtn">
                        <i class="fas fa-save me-1"></i> Save Record
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- View Maintenance Details Modal -->
    <div class="modal fade" id="viewMaintenanceModal" tabindex="-1" aria-labelledby="viewMaintenanceModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-lg-custom">
            <div class="modal-content">
                <div class="modal-header bg-info text-white">
                    <h5 class="modal-title" id="viewMaintenanceModalLabel"><i class="fas fa-info-circle me-2"></i>Maintenance Record Details</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row detail-row">
                        <div class="col-md-6">
                            <span class="detail-label">Maintenance ID:</span>
                            <p>MTN-001</p>
                        </div>
                        <div class="col-md-6">
                            <span class="detail-label">Vehicle:</span>
                            <p>Truck A12345</p>
                        </div>
                    </div>
                    <div class="row detail-row">
                        <div class="col-md-6">
                            <span class="detail-label">Type:</span>
                            <p>Preventive</p>
                        </div>
                        <div class="col-md-6">
                            <span class="detail-label">Date:</span>
                            <p>May 15, 2023</p>
                        </div>
                    </div>
                    <div class="row detail-row">
                        <div class="col-md-6">
                            <span class="detail-label">Mileage:</span>
                            <p>85,000 km</p>
                        </div>
                        <div class="col-md-6">
                            <span class="detail-label">Cost:</span>
                            <p>$350.00</p>
                        </div>
                    </div>
                    <div class="row detail-row">
                        <div class="col-md-6">
                            <span class="detail-label">Status:</span>
                            <p><span class="badge bg-success">Completed</span></p>
                        </div>
                        <div class="col-md-6">
                            <span class="detail-label">Technician:</span>
                            <p>John Smith</p>
                        </div>
                    </div>
                    <div class="row detail-row">
                        <div class="col-md-12">
                            <span class="detail-label">Description:</span>
                            <p>Regular preventive maintenance including oil change, filter replacement, and brake inspection.</p>
                        </div>
                    </div>
                    <div class="row detail-row">
                        <div class="col-md-12">
                            <span class="detail-label">Parts Replaced:</span>
                            <ul class="list-unstyled mb-0">
                                <li><i class="fas fa-check-circle text-success me-2"></i>Engine oil (5W-30 Synthetic)</li>
                                <li><i class="fas fa-check-circle text-success me-2"></i>Oil filter</li>
                                <li><i class="fas fa-check-circle text-success me-2"></i>Air filter</li>
                                <li><i class="fas fa-check-circle text-success me-2"></i>Brake pads</li>
                            </ul>
                        </div>
                    </div>
                    <div class="row detail-row">
                        <div class="col-md-12">
                            <span class="detail-label">Documentation:</span>
                            <div class="d-flex flex-wrap gap-2">
                                <button class="btn btn-sm btn-outline-primary">
                                    <i class="fas fa-file-invoice me-1"></i> Invoice
                                </button>
                                <button class="btn btn-sm btn-outline-secondary">
                                    <i class="fas fa-file-image me-1"></i> Photos
                                </button>
                                <button class="btn btn-sm btn-outline-success">
                                    <i class="fas fa-clipboard-check me-1"></i> Checklist
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editMaintenanceModal" data-bs-dismiss="modal">
                        <i class="fas fa-edit me-1"></i> Edit Record
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Maintenance Modal -->
    <div class="modal fade" id="editMaintenanceModal" tabindex="-1" aria-labelledby="editMaintenanceModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-lg-custom">
            <div class="modal-content">
                <div class="modal-header bg-warning text-white">
                    <h5 class="modal-title" id="editMaintenanceModalLabel"><i class="fas fa-edit me-2"></i>Edit Maintenance Record</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editMaintenanceForm">
                        <div class="row mb-3">
                            <div class="col-md-6 mb-3">
                                <label for="editMaintenanceId" class="form-label">Maintenance ID</label>
                                <input type="text" class="form-control" id="editMaintenanceId" value="MTN-001" readonly>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="editVehicleSelect" class="form-label">Vehicle</label>
                                <select class="form-select" id="editVehicleSelect" required>
                                    <option value="Truck A12345" selected>Truck A12345</option>
                                    <option value="Van B67890">Van B67890</option>
                                    <option value="Truck C45678">Truck C45678</option>
                                    <option value="Truck D90123">Truck D90123</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6 mb-3">
                                <label for="editMaintenanceType" class="form-label">Maintenance Type</label>
                                <select class="form-select" id="editMaintenanceType" required>
                                    <option value="Preventive" selected>Preventive</option>
                                    <option value="Corrective">Corrective</option>
                                    <option value="Inspection">Inspection</option>
                                    <option value="Emergency">Emergency</option>
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="editMaintenanceDate" class="form-label">Date</label>
                                <input type="date" class="form-control" id="editMaintenanceDate" value="2023-05-15" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6 mb-3">
                                <label for="editMileage" class="form-label">Mileage (km)</label>
                                <input type="number" class="form-control" id="editMileage" value="85000" required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="editCost" class="form-label">Cost ($)</label>
                                <input type="number" step="0.01" class="form-control" id="editCost" value="350.00" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6 mb-3">
                                <label for="editStatus" class="form-label">Status</label>
                                <select class="form-select" id="editStatus" required>
                                    <option value="Completed" selected>Completed</option>
                                    <option value="Scheduled">Scheduled</option>
                                    <option value="In Progress">In Progress</option>
                                    <option value="Overdue">Overdue</option>
                                </select>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="editTechnician" class="form-label">Technician</label>
                                <input type="text" class="form-control" id="editTechnician" value="John Smith">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="editDescription" class="form-label">Description</label>
                            <textarea class="form-control" id="editDescription" rows="3">Regular preventive maintenance including oil change, filter replacement, and brake inspection.</textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Parts Replaced</label>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" id="part1" checked>
                                <label class="form-check-label" for="part1">Engine oil (5W-30 Synthetic)</label>
                            </div>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" id="part2" checked>
                                <label class="form-check-label" for="part2">Oil filter</label>
                            </div>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" id="part3" checked>
                                <label class="form-check-label" for="part3">Air filter</label>
                            </div>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" id="part4" checked>
                                <label class="form-check-label" for="part4">Brake pads</label>
                            </div>
                            <div class="input-group mt-2">
                                <input type="text" class="form-control" placeholder="Add new part">
                                <button class="btn btn-outline-secondary" type="button">
                                    <i class="fas fa-plus"></i> Add
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-warning text-white" id="updateMaintenanceBtn">
                        <i class="fas fa-save me-1"></i> Update Record
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Confirmation Modal -->
    <div class="modal fade" id="deleteMaintenanceModal" tabindex="-1" aria-labelledby="deleteMaintenanceModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title" id="deleteMaintenanceModalLabel"><i class="fas fa-exclamation-triangle me-2"></i>Confirm Deletion</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to delete this maintenance record?</p>
                    <div class="alert alert-danger">
                        <strong>Warning:</strong> This action cannot be undone. All associated documentation will also be deleted.
                    </div>
                    <div class="mb-3">
                        <label for="deleteReason" class="form-label">Reason for deletion (optional)</label>
                        <textarea class="form-control" id="deleteReason" rows="2" placeholder="Enter reason for deletion..."></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-danger" id="confirmDeleteBtn">
                        <i class="fas fa-trash me-1"></i> Delete Record
                    </button>
                </div>
            </div>
        </div>
    </div>
    
<script src="../main/script.js">></script>
    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Custom JavaScript -->
    <script
