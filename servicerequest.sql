CREATE DATABASE service_request CHARACTER SET utf8 COLLATE utf8_general_ci;

CREATE TABLE service_request.srvcrqst(
    srvc_rqst_id INT NOT NULL AUTO_INCREMENT,
    srvc_rqst_no VARCHAR(12) NOT NULL,
    srvc_prcss_no VARCHAR(12) NOT NULL,
    srvc_status VARCHAR(50) NOT NULL,
    srvc_in_chrg VARCHAR(50) NOT NULL,
    srvc_in_chrg_id VARCHAR(10) NOT NULL,
    srvc_checker VARCHAR(50) NOT NULL,
    srvc_approver VARCHAR(50) NOT NULL,
    primary key (srvc_rqst_id)
);

CREATE TABLE service_request.ic(
    ic_id INT NOT NULL AUTO_INCREMENT,
    ic_no VARCHAR(12) NOT NULL,
    ic_crtd_date DATETIME NOT NULL,
    ic_rqst_date DATETIME NOT NULL,
    ic_rqstr VARCHAR(100) NOT NULL,
    ic_rqstr_id VARCHAR(10) NOT NULL,
    ic_rqstr_dprtmnt VARCHAR(10) NOT NULL,
    prcss_no VARCHAR(12) NOT NULL,
    ic_dtls TEXT NOT NULL,
    ic_prepared VARCHAR(100) NOT NULL,
    ic_checker VARCHAR(100) NOT NULL,
    ic_approver VARCHAR(100) NOT NULL,
    ic_status VARCHAR(100) NOT NULL,
    ic_attachement TEXT NOT NULL,
    received_by VARCHAR(100) NOT NULL,
    received_id VARCHAR(10) NOT NULL,
    received_date DATETIME NOT NULL,
    assigned_to VARCHAR(100) NOT NULL,
    assigned_id VARCHAR(10) NOT NULL,
    assigned_date DATETIME NOT NULL,
    acknowledged_date DATETIME NOT NULL,
    done_date DATETIME NOT NULL,
    user_approval VARCHAR(10) NOT NULL,
    close_date DATETIME NOT NULL,
    total_man_hour VARCHAR(100) NOT NULL,
    primary key (ic_id)
);


CREATE TABLE service_request.csr(
    csr_id INT NOT NULL AUTO_INCREMENT,
    csr_prcss_no VARCHAR(12) NOT NULL,
    csr_needed_date DATETIME NOT NULL,
    csr_change_date VARCHAR(50) NOT NULL,
    csr_adjusted_date DATETIME NOT NULL,
    csr_purchase_require VARCHAR(50) NOT NULL,
    csr_managers_approval VARCHAR(50) NOT NULL,
    csr_purchase_conforms VARCHAR(50) NOT NULL,
    csr_conforms_explain TEXT NOT NULL,
    primary key (csr_id)
);

CREATE TABLE service_request.cpr(
    cpr_id INT NOT NULL AUTO_INCREMENT,
    cpr_prcss_no VARCHAR(12) NOT NULL,
    cpr_occured_date DATETIME NOT NULL,
    cpr_prblm_ctgry VARCHAR(50) NOT NULL,
    primary key (cpr_id)
);

CREATE TABLE service_request.drr(
    drr_id INT NOT NULL AUTO_INCREMENT,
    drr_prcss_no VARCHAR(12) NOT NULL,
    drr_rcvr_date DATETIME NOT NULL,
    drr_file_srvr VARCHAR(500) NOT NULL,
    primary key (drr_id)
);

CREATE TABLE service_request.wrklg(
    wrklg_id INT NOT NULL AUTO_INCREMENT,
    ic_id VARCHAR(50) NOT NULL,
    wrklg_date DATETIME NOT NULL,
    wrklg_status VARCHAR(20) NOT NULL,
    wrklg_dtls TEXT NOT NULL,
    wrklg_personnel VARCHAR(100) NOT NULL,
    primary key (wrklg_id)
);