/**
 * ...
 */
enum States {
    VISIBLE,
    HIDDEN,
}

/**
 * ...
 */
class VisibilityState {
    /**
     * ...
     *
     * @type States
     */
    private state: States;

    /**
     * ...
     *
     * @param state { States }
     *   ...
     */
    public constructor(state: States = States.HIDDEN) {
        this.state = state;
    }

    /**
     * ...
     *
     * @return void
     */
    public setVisible(): void {
        this.state = States.VISIBLE;
    }

    /**
     * ...
     *
     * @return boolean
     */
    public isVisible(): boolean {
        return this.state === States.VISIBLE;
    }

    /**
     * ...
     *
     * @return void
     */
    public setHidden(): void {
        this.state = States.HIDDEN;
    }

    /**
     * ...
     *
     * @return boolean
     */
    public isHidden(): boolean {
        return this.state === States.HIDDEN;
    }


}

export default VisibilityState;
