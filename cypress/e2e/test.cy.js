describe("ALL TESTS",()=>{
    beforeEach(()=>{
        cy.visit("http://localhost/finalform/signin.php");
    })
    it("should display error messages for empty field on submit",()=>{
        cy.get('button[name=submit]').click();

        cy.get('#user-error').should('contain','Username cannot be empty');
        cy.get('#pass-error').should('contain','Password cannot be empty');
    })

    it("should display error if username is less than three characters",()=>{
        cy.get('#userid').type('MB');
        cy.get('#passwordid').type('CT-21056');

        cy.get('button[name=submit]').click();

        cy.get('#user-error').should('contain','Username should be atleast 3 characters');
    })

    it("should display error on incorrect password type",()=>{
        cy.get('#userid').type('maryum');
        cy.get('#passwordid').type('123');

        cy.get('button[name=submit]').click();

        cy.get("#pass-error").should('contain',"Invalid password");
    })

    it("should submit the form on correct input",()=>{
        cy.get("#userid").type('maryum');
        cy.get("#passwordid").type("CT-21056");
        cy.get('button[name=submit]').click();
        
    })
    
    
})