import 'cypress-file-upload';


describe("ALL HOME TESTS",()=>{
    beforeEach(()=>{
        cy.visit("http://localhost/finalform/home.php");
    })
    it("should display error when the username is invalid",()=>{
        cy.get("#nid").type('MB');
        cy.get("#eid").type('CT-21056');
        cy.get("#imgid").attachFile("Javed_Saheb.jpg");
        cy.get('button[name=submit]').click();
        cy.on('window:alert',(text)=>{
            expect(text).to.contains('Invalid username');
        });
    })
    it("should display error when the username is invalid",()=>{
        cy.get("#nid").type('Mjkasdkjdkweyuiruiwqeksmdiayfyi');
        cy.get("#eid").type('CT-21056');
        cy.get("#imgid").attachFile("Javed_Saheb.jpg");
        cy.get('button[name=submit]').click();
        cy.on('window:alert',(text)=>{
            expect(text).to.contains('Invalid username');
        });
    })
    it("should display error when the enrollment is invalid",()=>{
        cy.get("#nid").type("maryum");
        cy.get("#eid").type("123456");
        cy.get("#imgid").attachFile("Javed_Saheb.jpg");
        cy.get("button[name=submit]").click();
        cy.on("windows:alert",(text)=>{
            expect(text).to.contains("Invalid eid");
        });
    })
    it("should submit the form when inputs are valid",()=>{
        cy.get("#nid").type("maryum");
        cy.get("#eid").type("CT-21056");
        cy.get("#imgid").attachFile("Javed_Saheb.jpg");
        cy.get("button[name=submit]").click();

        cy.get("#usercontainer").children().should("have.length",1);
        cy.get('#usercontainer .userclass').within(()=>{
            cy.get("h2").eq(0).should("contain.text","Username: maryum");
            cy.get("h2").eq(1).should("contain.text","Enrollment: CT-21056");
            cy.get('img').should('have.attr','src').and('include','blob:');
        });

    })
    // it('should search for a username', () => {
    //     cy.get('#nid').type('userone');
    //     cy.get('#eid').type('CT-21056');
    //     cy.get('#imgid').attachFile('Javed_Saheb.jpg');
    //     cy.get('button[name="submit"]').click();

    //     cy.get('#nid').clear().type('usertwo');
    //     cy.get('#eid').clear().type('CD-67890');
    //     cy.get('#imgid').attachFile('Javed_Saheb.jpg');
    //     cy.get('button[name="submit"]').click();

    //     cy.get('#Search').type('userone');
    //     // cy.get('#usercontainer .userclass').should('have.length', 1);
    //     // cy.get('#usercontainer .userclass h2').eq(0).should('contain.text', 'Username: userone');
    // });

})